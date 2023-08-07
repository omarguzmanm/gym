<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
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

        // Lanza el evento  
        // Queremos que el evento solo se emita a los otros usuarios, esto para que no duplique el msj.
        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }

}