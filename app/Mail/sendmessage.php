<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendmessage extends Mailable
{
    use Queueable, SerializesModels;

    public $messageId;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageId)
    {
        $this->messageId = $messageId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sendmessage', ['messageId'=> $this->messageId] );
    }
}
