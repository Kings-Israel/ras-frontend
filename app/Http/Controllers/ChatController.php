<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Chat;

class ChatController extends Controller
{
    public function index(User $user = null)
    {
        $conversation = null;
        $conversation_id = null;

        if ($user) {
            $conversation = Chat::conversations()->between(auth()->user(), $user);

            if (!$conversation) {
                $participants = [auth()->user(), $user];
                $conversation = Chat::createConversation($participants);
                $conversation->update([
                    'direct_message' => true,
                ]);
            }
            $conversation_id = $conversation->id;
            Chat::conversation($conversation)->setParticipant(auth()->user())->readAll();
            $conversation = Chat::conversation($conversation)->setParticipant(auth()->user())->limit(250000)->getMessages();
        }

        $conversations = Chat::conversations()
                                ->setParticipant(auth()->user())
                                ->get();

        $conversations = Arr::pluck($conversations, 'conversation');

        if (auth()->user()->hasRole('vendor')) {
            return view('business.chat.index', [
                'conversations' => ConversationResource::collection($conversations),
                'conversation' => ['user' => $user, 'conversation_id' => $conversation ? $conversation->id : NULL, 'messages' => $conversation ? MessageResource::collection($conversation) : NULL]
            ]);
        }

        return view('chat.index', [
            // 'test' => file_get_contents('../chat.json')
            'conversations' => ConversationResource::collection($conversations),
            'conversation' => ['user' => $user, 'conversation_id' => $conversation ? $conversation_id : NULL, 'messages' => $conversation ? MessageResource::collection($conversation) : NULL]
        ]);
    }

    public function view($id)
    {
        // Get one conversation
        $conversation = Chat::conversations()->getById($id);

        if (!$conversation) {
            toastr()->error('', 'Conversation not found');
            return back();
        }

        Chat::conversation($conversation)->setParticipant(auth()->user())->readAll();

        $messages = MessageResource::collection(Chat::conversation($conversation)->setParticipant(auth()->user())->limit(250000)->getMessages());
        $user =  User::find(collect($conversation->getParticipants())->filter(fn ($user) => $user->id != auth()->id())->first()->id);

        if(request()->wantsJson()) {
            return response()->json([
                // 'conversations' => file_get_contents('../chat-log.json')
                'conversations' => ['user' => $user, 'messages' => $messages]
            ], 200);
        } else {
            return view('chat.index', [
                'conversations' => ['user' => $user, 'messages' => $messages]
            ]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => ['required'],
            'message' => ['required'],
        ]);

        $user = User::find($request->receiver_id);

        if (!$user) {
            toastr()->error('', 'User not found');
            return back();
        }

        $conversation = Chat::conversations()->between(auth()->user(), $user);

        if (!$conversation) {
            $participants = [auth()->user(), $user];
            // Create a new conversation
            $conversation = Chat::createConversation($participants);
            $conversation->update([
                'direct_message' => true
            ]);
        }

        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->files as $file) {
                if (is_array($file)) {
                    foreach($file as $data) {
                        $size = filesize($data);
                        $originalFilename = pathinfo($data->getClientOriginalName(), PATHINFO_FILENAME);
                        // this is needed to safely include the file name as part of the URL
                        $newFilename = $originalFilename.'-'.uniqid().'.'.$data->guessExtension();
                        $data->move('storage/chat', $newFilename);
                        array_push($files, ['file_name' => $data->getClientOriginalName(), 'file_url' => config('app.url').'/storage/chat/'.$newFilename, 'file_size' => $size, 'file_type' => $data->getClientMimeType()]);
                    }
                }
            }
        }

        $message = Chat::message($request->message)->from(auth()->user())->data($files)->to($conversation)->send();

        event(new SendMessage($user->email, $user, new MessageResource($message), new ConversationResource($conversation)));

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Message sent successfully', 'data' => new MessageResource($message)], 200);
        }

        return back();
    }
}
