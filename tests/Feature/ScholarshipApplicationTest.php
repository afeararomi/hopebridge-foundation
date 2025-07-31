<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification; // For general notifications, if used
use Illuminate\Support\Facades\DB; // To directly check DB for Supabase

class ScholarshipApplicationTest extends TestCase
{
    use WithFaker; // Enables faker for generating dummy data

    /**
     * Set up the test environment.
     * Use a dedicated test bucket if possible, or ensure cleanup.
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Mock Storage facade to prevent actual file uploads during testing
        Storage::fake('supabase');
        // Mock Mail facade to prevent actual emails being sent
        Mail::fake();
        // Mock Notification facade if you use notifications
        Notification::fake();
    }

    /**
     * Test successful scholarship application submission.
     * @return void
     */
    public function test_scholarship_application_can_be_submitted_successfully()
    {
        $dob = now()->subYears(18)->subMonth()->format('Y-m-d'); // Ensures applicant is > 17

        $response = $this->post(route('scholarship.apply.submit'), [
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'dob' => $dob,
            'nationality' => 'Nigerian',
            'state_of_origin' => $this->faker->randomElement(['Edo', 'Delta']),
            'lga_of_origin' => $this->faker->word, // Will be validated by frontend, mock for backend
            'university_name' => $this->faker->randomElement([
                "Abia State University", "Ambrose Alli University", "Delta State University Abraka"
            ]),
            'course_of_study' => $this->faker->word . ' Engineering',
            'birth_certificate' => UploadedFile::fake()->create('birth_certificate.pdf', 1000, 'application/pdf'),
            'national_id_card' => UploadedFile::fake()->create('national_id_card.png', 800, 'image/png'),
            'university_library_card' => UploadedFile::fake()->create('library_card.jpg', 700, 'image/jpeg'),
        ]);

        $response->assertSessionHas('success'); // Check for success flash message
        $response->assertRedirect(route('scholarship.status')); // Should redirect to status page

        // Assert files were "stored" on the fake disk
        Storage::disk('supabase')->assertExists('applications/' . session('application_id') . '/birth_certificate.pdf');
        Storage::disk('supabase')->assertExists('applications/' . session('application_id') . '/national_id_card.png');
        Storage::disk('supabase')->assertExists('applications/' . session('application_id') . '/university_library_card.jpg');

        // Assert an email was sent
        Mail::assertSent(\App\Mail\ScholarshipApplicationConfirmation::class);

        // Assert record exists in the database (using DB facade for Supabase)
        $this->assertDatabaseHas('scholarships', [
            'firstname' => $response->original->exception->validator->getData()['firstname'], // Get data from session or validated data
            'email' => $response->original->exception->validator->getData()['email'],
            'application_status' => 'Pending',
            'scholarship_program_id' => 'hopebridge_midwestern_scholars_program_2025'
        ]);
        // Note: session('application_id') will hold the generated ID for redirect verification.
    }

    /**
     * Test scholarship application validation failures.
     * @return void
     */
    public function test_scholarship_application_fails_validation_with_invalid_data()
    {
        $response = $this->post(route('scholarship.apply.submit'), [
            'firstname' => '', // Missing
            'dob' => now()->format('Y-m-d'), // Too young (if current date is recent)
            'email' => 'invalid-email', // Invalid email
            'birth_certificate' => UploadedFile::fake()->create('large.pdf', 2000, 'application/pdf'), // Too large
        ]);

        $response->assertSessionHasErrors(['firstname', 'dob', 'email', 'birth_certificate']);
        $response->assertStatus(302); // Redirect back due to validation error
        Mail::assertNotSent(\App\Mail\ScholarshipApplicationConfirmation::class); // No email on failure
        Storage::disk('supabase')->assertMissing('applications'); // No files stored on failure
        $this->assertDatabaseMissing('scholarships', ['email' => 'invalid-email']);
    }

    /**
     * Test application status check.
     * @return void
     */
    public function test_application_status_can_be_checked()
    {
        // First, submit a successful application to get a valid ID
        $dob = now()->subYears(19)->format('Y-m-d');
        $email = $this->faker->unique()->safeEmail;
        $response = $this->post(route('scholarship.apply.submit'), [
            'firstname' => 'Test',
            'lastname' => 'Applicant',
            'dob' => $dob,
            'nationality' => 'Nigerian',
            'state_of_origin' => 'Edo',
            'lga_of_origin' => 'Oredo',
            'university_name' => 'Ambrose Alli University',
            'course_of_study' => 'Computer Science',
            'email' => $email,
            'birth_certificate' => UploadedFile::fake()->create('cert.pdf', 100, 'application/pdf'),
            'national_id_card' => UploadedFile::fake()->create('id.png', 100, 'image/png'),
            'university_library_card' => UploadedFile::fake()->create('lib.jpg', 100, 'image/jpeg'),
        ]);

        // Get the application ID from the session redirect
        $applicationId = session('application_id');

        // Now, try to check the status using that ID
        $statusCheckResponse = $this->get(route('scholarship.status', ['application_id' => $applicationId]));

        $statusCheckResponse->assertStatus(200);
        $statusCheckResponse->assertViewIs('scholarship.status');
        $statusCheckResponse->assertViewHas('applicationStatus', 'Pending'); // Initial status is Pending
        $statusCheckResponse->assertSeeText('Status: Pending');
    }

    /**
     * Test application status check with non-existent ID.
     * @return void
     */
    public function test_application_status_check_fails_with_non_existent_id()
    {
        $response = $this->get(route('scholarship.status', ['application_id' => 'non-existent-id']));

        $response->assertStatus(200); // Still 200 because the page loads
        $response->assertViewIs('scholarship.status');
        $response->assertViewHas('error');
        $response->assertSeeText('Application ID not found. Please check your ID and try again.');
    }
}