<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MaximumWordsInDictionaryReached
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dictionaryId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($dictionaryId)
    {
        $this->dictionaryId = $dictionaryId;
    }


}
