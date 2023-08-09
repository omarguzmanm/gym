<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ShowMessages extends Component
{

    // protected $listeners = ['contactAdded' => 'refreshContacts'];
    protected $listeners = ['render'];


    public function render(Chat $chat)
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
        return view('livewire.show-messages',[
            'msgsUser' => $msgsUser
        ]);
    }
}
