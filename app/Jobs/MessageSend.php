<?php

namespace App\Jobs;

use App\Events\SendMessage;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $user, public $message, public $conversation)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        SendMessage::dispatch($this->user->email, $this->user, new MessageResource($this->message), new ConversationResource($this->conversation));
    }
}
