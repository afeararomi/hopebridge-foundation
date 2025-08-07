<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // This will now correctly route to quix-labs/laravel-supabase-flysystem disk
use Illuminate\Support\Facades\DB; // For database interaction
use Illuminate\Support\Str; // For generating UUIDs/unique IDs
use Illuminate\Support\Facades\Mail; // For sending emails
use Illuminate\Support\Facades\Log; // For logging
use App\Mail\ScholarshipApplicationConfirmation;

class ScholarshipController extends Controller
{
    /**
     * Display the scholarship application form.
     *
     * @return \Illuminate\View\View
     */
    public function showApplicationForm()
    {
        return view('scholarship.apply');
    }

    /**
     * Handle the submission of the scholarship application form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitApplication(Request $request)
    {
        // 1. Backend Validation
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255', // Added email field as discussed
            'dob' => 'required|date|before_or_equal:' . now()->subYears(17)->format('Y-m-d'), // At least 17 years old
            'nationality' => 'required|string|max:255',
            'state_of_origin' => 'required|string|in:Edo,Delta',
            'lga_of_origin' => 'required|string|max:255',
            'university_name' => 'required|string|max:255',
            'course_of_study' => 'required|string|max:255',
            'birth_certificate' => 'required|file|mimes:png,jpg,jpeg,pdf|max:1126', // max:1126 KB = 1.1MB
            'national_id_card' => 'required|file|mimes:png,jpg,jpeg,pdf|max:1126',
            'university_library_card' => 'required|file|mimes:png,jpg,jpeg,pdf|max:1126',
        ], [
            'dob.before_or_equal' => 'You must be at least 17 years old to apply.',
            'birth_certificate.max' => 'The birth certificate must not be greater than 1MB.',
            'national_id_card.max' => 'The national ID card must not be greater than 1MB.',
            'university_library_card.max' => 'The university library card must not be greater than 1MB.',
            'birth_certificate.mimes' => 'The birth certificate must be a file of type: png, jpg, jpeg, pdf.',
            'national_id_card.mimes' => 'The national ID card must be a file of type: png, jpg, jpeg, pdf.',
            'university_library_card.mimes' => 'The university library card must be a file of type: png, jpg, jpeg, pdf.',
        ]);

        // Generate a unique Application ID
        $applicationId = Str::uuid();

        // Define the scholarship program ID for future differentiation
        $scholarshipProgramId = 'hopebridge_midwestern_scholars_program_2025';

        $fileUrls = [];

        try 
        {
            // 2. File Uploads to Supabase Storage using 'supabase' disk
            // Files will be uploaded to: scholarship-documents/applications/{application_id}/{original_filename}
            $uploadBaseDir = 'applications/' . $applicationId . '/'; // Path within the bucket for this application's files; Matches RLS policy

            foreach (['birth_certificate', 'national_id_card', 'university_library_card'] as $fileField) 
            {
                if ($request->hasFile($fileField)) 
                {
                    $file = $request->file($fileField);
                    // $fileName = $fileField . '.' . $file->getClientOriginalExtension(); // e.g., 'birth_certificate.pdf'
                    // Use a clean filename (e.g., birth_certificate.pdf, national_id_card.png)
                    $originalFileName = Str::slug($fileField) . '.' . $file->getClientOriginalExtension();

                    // Log::channel('daily')->info("Attempting to upload {$fileName} to {$uploadBaseDir}");
                    Log::channel('daily')->info("Attempting to upload {$originalFileName} for application ID: {$applicationId}");

                    // Check if file object is valid before attempting upload
                    if (!$file->isValid()) {
                        // Log::channel('daily')->error("Uploaded file {$fileName} is not valid.");
                        Log::channel('daily')->error("Uploaded file {$originalFileName} for field {$fileField} is not valid.");
                        continue; // Skip to next file
                    }
                    
                    // Perform the upload using the 'supabase' disk configured in filesystems.php
                    // Upload the file to Supabase Storage using the 'supabase' disk
                    // We're assuming the Supabase bucket is set to PRIVATE (recommended for sensitive documents)
                    // and thus we are NOT passing ['public'] option, meaning access will require signed URLs or service_role access from the backend.
                    // Note: putFileAs returns the path relative to the disk's root. For Supabase, this path should be directly usable to construct the URL.
                    $uploadedFilePath = Storage::disk('supabase')->putFileAs(
                        $uploadBaseDir,     // Directory within the bucket (e.g., 'applications/UUID/')
                        $file,              // The file to upload
                        $originalFileName   // The desired filename in storage (e.g., 'birth_certificate.pdf')
                                            // [] Use ['public'] if you want direct access via URL, otherwise omit for private
                    );

                    // Construct the full URL for the stored file.
                    // Supabase's public URL format is generally:
                    // [SUPABASE_URL]/storage/v1/object/public/[BUCKET_NAME]/[FILE_PATH]
                    // We'll rely on a helper or direct construction for the URL.
                    // If 'public' option is not used above, this URL will require signing.

                    if($uploadedFilePath) 
                    {
                        // The `url()` method for private buckets might return a path
                        // For public buckets, it returns a direct URL.
                        // For private files, you typically generate a signed URL when needed for download.
                        // For now, we store the internal path, and you'd generate signed URLs if the NGO needs to view them.
                        // If your bucket is PUBLIC, then Storage::disk('supabase')->url($uploadedFilePath) will give you a direct URL.
                        // $fileUrls[$fileField] = Storage::disk('supabase')->url($uploadedFilePath);
                        // Log::channel('daily')->info("Successfully uploaded {$fileName}. URL: {$fileUrls[$fileField]}");
                        $fileUrls[$fileField] = $uploadedFilePath; // Store the relative path within the bucket
                        Log::channel('daily')->info("Successfully uploaded {$originalFileName}. Path: {$uploadedFilePath}");
                    } 
                    else 
                    {
                        // Log::channel('daily')->error("Failed to upload {$fileName}. putFileAs returned false.");
                        Log::channel('daily')->error("Failed to upload {$originalFileName}. putFileAs returned false.");
                    }
                } 
                else 
                {
                    Log::channel('daily')->warning("No file provided for field: {$fileField}. Validation should have caught this.");
                }
            }

            // 3. Insert Record into Supabase Database
            DB::table('scholarships')->insert([
                'firstname' => $validatedData['firstname'],
                'middlename' => $validatedData['middlename'] ?? null,
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'dob' => $validatedData['dob'],
                'nationality' => $validatedData['nationality'],
                'state_of_origin' => $validatedData['state_of_origin'],
                'lga_of_origin' => $validatedData['lga_of_origin'],
                'university_name' => $validatedData['university_name'],
                'course_of_study' => $validatedData['course_of_study'],
                'birth_certificate_url' => $fileUrls['birth_certificate'] ?? null,
                'national_id_card_url' => $fileUrls['national_id_card'] ?? null,
                'university_library_card_url' => $fileUrls['university_library_card'] ?? null,
                'application_id' => $applicationId,
                'scholarship_program_id' => $scholarshipProgramId,
                'application_status' => 'Pending', // Default status upon submission
                'created_at' => now(), // Add created_at timestamp
            ]);

            // 4. Send Email Notification to Applicant
            Mail::to($validatedData['email'])
                ->send(new ScholarshipApplicationConfirmation($applicationId, $validatedData['firstname']));

            // Log successful submission
            Log::channel('daily')->info('Scholarship Application Submitted:', [
                'application_id' => $applicationId,
                'name' => $validatedData['firstname'] . ' ' . $validatedData['lastname'],
                'email' => $validatedData['email']
            ]);

            return redirect()->route('scholarship.status')->with([
                'success' => 'Your application has been submitted successfully!',
                'application_id' => $applicationId
            ])->withInput(['application_id' => $applicationId]);

        } catch (\Exception $e) 
        {
            // Log the error
            Log::channel('daily')->error('File Upload/Scholarship Application Submission Error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString(), // Get full stack trace
                'request_data' => $request->all(), // Log request data for debugging
                'request_files' => $request->allFiles() // See what files were in the request
            ]);

            // Clean up any partially uploaded files if an error occurs after some uploads
            foreach ($fileUrls as $pathToDelete) {
                if ($pathToDelete && Storage::disk('supabase')->exists($pathToDelete)) {
                    Storage::disk('supabase')->delete($pathToDelete);
                    Log::channel('daily')->info("Cleaned up partially uploaded file: {$pathToDelete}");
                }
            }

            // Re-throw or handle error appropriately
            return redirect()->back()->with('error', 'There was an error processing your application. Please try again later.')->withInput();
        }
    }



    // ... rest of the controller remains the same ...
    public function checkStatus(Request $request)
    {
        $applicationId = $request->input('application_id');
        $applicationStatus = null;
        $error = null;

        if ($applicationId) {
            try {
                $application = DB::table('scholarships')
                                ->where('application_id', $applicationId)
                                ->select('application_status')
                                ->first();

                if ($application) {
                    $applicationStatus = $application->application_status;
                    Log::channel('daily')->info('Scholarship Status Checked:', [
                        'application_id' => $applicationId,
                        'status' => $applicationStatus
                    ]);
                } else {
                    $error = 'Application ID not found. Please check your ID and try again.';
                    Log::channel('daily')->warning('Scholarship Status Check - ID Not Found:', [
                        'application_id' => $applicationId
                    ]);
                }
            } catch (\Exception $e) {
                $error = 'An error occurred while fetching your application status. Please try again later.';
                Log::channel('daily')->error('Scholarship Status Check Error: ' . $e->getMessage(), [
                    'exception' => $e,
                    'application_id' => $applicationId
                ]);
            }
        }

        return view('scholarship.status', compact('applicationStatus', 'error', 'applicationId'));
    }


}