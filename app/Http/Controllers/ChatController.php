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
        $userAuth = auth()->user();
        // Nos traemos todas las salas y los mensajes donde esté vinculado el user auth
        // $msgsUser = $userAuth->chats()->get();
        $msgsUser = $userAuth->chats()
        ->with([
            'messages' => function ($query) use ($userAuth) {
                $query->whereIn('id', function ($subquery) use ($userAuth) {
                    $subquery->selectRaw('MAX(id)')
                        ->from('messages')
                        ->where('user_id', '!=', $userAuth->id)
                        ->groupBy('user_id');
                });
                $query->orderBy('created_at', 'desc');
                $query->with('user'); // Cargar la relación "user" dentro de cada mensaje
            }
        ])
        ->get();
    
    
            // dd($msgsUser);
        // $messages = Message::where('user_id', auth()->id())->get();
        // $msg = Chat::where('user_id', auth()->id())->get();
        // dd($msgUser);
        // La variable chat va a traer los usuario que estan en la misma sala
        abort_unless($chat->users->contains(auth()->id()), 403);
        return view('chat', [
            'chat' => $chat,
            'msgsUser' => $msgsUser
        ]);
    }

    public function get_users(Chat $chat)
    {
        $users = $chat->users;

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

    public function received(Chat $chat)
    {
        // La variable chat va a traer los usuario que estan en la misma sala
        return view('chat');
    }

}