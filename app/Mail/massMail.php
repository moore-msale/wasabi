<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class massMail extends Mailable
{
    public $massMessageContent;
    use Queueable, SerializesModels;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$subject)
    {
        $this->massMessageContent = $content;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.massMail');
    }
}