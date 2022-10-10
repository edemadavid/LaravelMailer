<?php

namespace App\Mail;

use App\Models\EmailMessages;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sending extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * The order instance.
     *
     * @var \App\Models\EmailMessages
     */
    public $EmailMessages;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\EmailMessages  $EmailMessages
     * @return void
     */
    public function __construct(EmailMessages $EmailMessages )
    {
        $this->EmailMessages = $EmailMessages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.sending');
    }
}
