<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Binding
    public function chat_with(User $user)
    {
        $user_a = auth()->user();
        $user_b = $user;

        $chat = $user_a->chats()->whereHas('users', function ($query) use ($user_b) {
            $query->where('chat_user.user_id', $user_b->id);
        })->first();

        if (!$chat) {
            $chat = Chat::create([]);
            $chat->users()->sync([$user_a->id, $user_b->id]);
        }

        return redirect()->route('chat.show', $chat);
    }

    public function show(Chat $chat)
    {
        // La variable chat va a traer los usuario que estan en la misma sala
        abort_unless($chat->users->contains(auth()->id()), 403);
        return view('chat.chat', [
            'chat' => $chat
        ]);
    }

    public function get_users(Chat $chat)
    {
        $users = $chat->users;
        // dd($users);
        return response()->json([
            'users' => $users
        ]);
    }

    public function get_messages(Chat $chat)
    {
        $messages = $chat->messages()->with('user')->get();
        return response()->json([
            'messages' => $messages
        ]);
    }

    public function received()
    {
        return view('chat.messages');
    }

}