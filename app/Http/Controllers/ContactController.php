<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // For logging
use Illuminate\Support\Facades\Mail; // For sending emails
use App\Mail\ContactFormMail; // We'll create this Mailable later

class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function showContactForm()
    {
        return view('contact');
    }

    /**
     * Handle the submission of the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContactForm(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_subject' => 'required|string|max:255',
            'contact_message' => 'required|string',
        ]);

        try {
            // Log the contact form submission
            Log::channel('daily')->info('Contact Form Submission:', [
                'name' => $validatedData['contact_name'],
                'email' => $validatedData['contact_email'],
                'subject' => $validatedData['contact_subject'],
                'message_preview' => substr($validatedData['contact_message'], 0, 100) . (strlen($validatedData['contact_message']) > 100 ? '...' : '')
            ]);

            // Send email notification to NGO (and optionally a confirmation to the sender)
            Mail::to('info@hopebridgefoundation.org') // NGO's contact email
                ->send(new ContactFormMail($validatedData));

            // You might also send a confirmation email back to the user
            // Mail::to($validatedData['contact_email'])->send(new ContactConfirmationMail());

            return redirect()->back()->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            Log::channel('daily')->error('Error sending contact form email: ' . $e->getMessage(), [
                'exception' => $e
            ]);
            return redirect()->back()->with('error', 'There was an issue sending your message. Please try again later.');
        }
    }
}