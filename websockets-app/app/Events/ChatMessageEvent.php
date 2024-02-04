<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

//class PlaygroundEvent
class ChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            //new PrivateChannel('channel-name'),
            // Parts: channel.class.model.add.more.parts
            //new Channel('public.playground.1'),
            new Channel('public.chat.1')
        ];
    }

    /**
     * Event Name
     */
    public function broadcastAs()
    {
        // return 'playground';
        return 'chat-message';
    }

    /**
     * Event details
     */
    public function broadcastWith()
    {
        // return [
        //     'heya' => 123
        // ];
        return [
            'message' => $this->message
        ];
    }
}
