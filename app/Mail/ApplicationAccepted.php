<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;
    public $jobTitle;
    public $recruiterName;
    public $recruiterEmail;
    public $recruiterPhone;

    /**
     * Create a new message instance.
     */
    public function __construct($applicantName, $jobTitle, $recruiterName, $recruiterEmail, $recruiterPhone = null)
    {
        $this->applicantName = $applicantName;
        $this->jobTitle = $jobTitle;
        $this->recruiterName = $recruiterName;
        $this->recruiterEmail = $recruiterEmail;
        $this->recruiterPhone = $recruiterPhone;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Application Accepted - ' . $this->jobTitle,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.application_accepted',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
