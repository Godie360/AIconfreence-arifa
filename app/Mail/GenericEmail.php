<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class GenericEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $content; // Store the dynamic content

    /**
     * Create a new message instance.
     *
     * @param array $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->content['subject'])
            ->view('icafw_conference.generic_email'); // Use a generic email view
    }
}
