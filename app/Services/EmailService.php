<?php

namespace App\Services;

use App\Mail\GenericEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    /**
     * Send an email to any recipient.
     *
     * @param string $to
     * @param string $subject
     * @param string $recipientName
     * @param string $body
     * @return void
     */
    public function sendEmail($to, $subject, $recipientName, $body)
    {
        // Prepare the email content
        $emailContent = [
            'subject' => $subject,
            'recipient_name' => $recipientName,
            'body' => $body,
        ];

        // Send the email as an HTML email using the GenericEmail Mailable class
        Mail::to($to)->send(new GenericEmail($emailContent));
    }
}
