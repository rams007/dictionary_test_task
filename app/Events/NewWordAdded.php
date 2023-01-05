<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewWordAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $word;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($word)
    {
        $this->word = $word;
    }

}
