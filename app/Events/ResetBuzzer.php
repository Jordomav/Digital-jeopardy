<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Game;

class ResetBuzzer extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $join_code;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($joinCode)
    {
        $this->join_code = $joinCode;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['buzzer-reset.'.$this->join_code];
    }
}
