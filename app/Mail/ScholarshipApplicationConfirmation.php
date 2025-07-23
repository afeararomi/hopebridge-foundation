<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScholarshipApplicationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationId;
    public $applicantName;

    /**
     * Create a new message instance.
     */
    public function __construct(string $applicationId, string $applicantName)
    {
        $this->applicationId = $applicationId;
        $this->applicantName = $applicantName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'HopeBridge Scholarship Application Confirmation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.scholarship_confirmation', // Blade view for the email content
            with: [
                'applicationId' => $this->applicationId,
                'applicantName' => $this->applicantName,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}