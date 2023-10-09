<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $receiver;
    public $message;
    public $conversation;

    /**
     * Create a new event instance.
     */
    public function __construct($email, User $user, $message, $conversation)
    {
        $this->email = $email;
        $this->receiver = $user;
        $this->message = $message;
        $this->conversation = $conversation;
    }

    /**
    * Get the channels the event should broadcast on.
    *
    * @return \Illuminate\Broadcasting\Channel|array
    */
    public function broadcastOn()
    {
        return new Channel(''.$this->email.'');
    }

    public function broadcastAs()
    {
        return 'new.message';
    }

    public function broadcastWith()
    {
        return [
            'user' => $this->receiver,
            'message' => $this->message,
            'conversation' => $this->conversation
        ];
    }
}
