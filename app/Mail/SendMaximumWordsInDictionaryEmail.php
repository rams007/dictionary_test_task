<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMaximumWordsInDictionaryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dictionaryId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dictionaryId)
    {
        $this->dictionaryId = $dictionaryId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.maximumWordsInDictionary');
    }
}
