<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateChat extends Component
{
    // public $users;
    public $search = '';
    public $message = 'Bienvenido a Future fit:)';
    public $userSelected;

    public function checkconversation($receiverId)
    {
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)->where('sender_id', $receiverId)->orWhere('receiver_id', $receiverId)->where('sender_id', auth()->user()->id)->get();
        if (count($checkedConversation) == 0) {

            // dd(no conversation);
            $createdConversation = Conversation::create(['receiver_id' => $receiverId, 'sender_id' => auth()->user()->id, 'last_time_message' => now()]);
            /// conversation created 
            $createdMessage = Message::create(['conversation_id' => $createdConversation->id, 'sender_id' => auth()->user()->id, 'receiver_id' => $receiverId, 'body' => $this->message]);

            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();

            // dd($createdMessage);
            // dd('saved');
            return redirect()->route('chat');
        }

    }

    public function render()
    {
        // $this->users = User::where('id', '!=', auth()->user()->id)->get();
        $users = User::where('id', '!=', auth()->user()->id)->where('name', 'like', '%' . $this->search . '%')->get();
        if(!empty($this->userSelected)){
            $this->checkconversation($this->userSelected);
        }
        return view('livewire.chat.create-chat', compact('users'));;
    }
}