<?php

namespace App\Listeners;

use App\Events\MaximumWordsInDictionaryReached;
use App\Mail\SendMaximumWordsInDictionaryEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendMaximumWordReachedEmailToAdmin implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\MaximumWordsInDictionaryReached $event
     * @return void
     */
    public function handle(MaximumWordsInDictionaryReached $event)
    {
        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new SendMaximumWordsInDictionaryEmail($event->dictionaryId));
        } catch (Throwable $e) {
            Log::error('Error sending email ' . $e->getMessage());
        }
    }
}
