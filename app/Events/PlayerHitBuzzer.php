<?php

namespace App\Events;

use App\Events\Event;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PlayerHitBuzzer extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $player;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($player)
    {
        $this->player = $player; // this is the event data that we send along with the Pusher broadcast
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        $specificGameChannel = 'buzz.'.$this->player['game_join_code'];
        return [$specificGameChannel];
    }
}
