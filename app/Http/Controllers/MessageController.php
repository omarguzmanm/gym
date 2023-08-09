<?php

namespace App\Http\Controllers;

use Livewire;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Http\Livewire\ShowMessages; // Asegúrate de usar la ruta correcta

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sent(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id
        ])->load('user');

        //Emitimos un evento para renderizar la vista de livewire
        // EmitTo recibde dos parametros:
        // 1. Desde donde va escuchar el evento. 2. Metodo que renderiza.
        
        // Lanza el evento  
        // Queremos que el evento solo se emita a los otros usuarios, esto para que no duplique el msj.
        broadcast(new MessageSent($message))->toOthers();
        return $message;
    }

}