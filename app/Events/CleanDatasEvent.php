<?php

namespace App\Events;

use App\Models\Costumer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class CleanDatasEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $costumer, $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Costumer $costumer, Request $request)
    {
        $this->costumer = $costumer;
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
