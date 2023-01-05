<?php

namespace App\Listeners;

use App\Events\NewWordAdded;
use App\Http\Controllers\Service\DictionaryAPIService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetWordDataFromApi implements ShouldQueue
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
     * @param \App\Events\NewWordAdded $event
     * @return void
     */
    public function handle(NewWordAdded $event)
    {
        DictionaryAPIService::getWordData($event->word);

    }
}
