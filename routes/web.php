<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\DietUser;
use App\Http\Livewire\AnalysisUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use App\Http\Livewire\ShowDietUser;
use App\Http\Livewire\ShowAnalysisUser;
use App\Http\Livewire\ShowMessages;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\Auth\CreateClient;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', ShowUsers::class)->name('dashboard');
});

Route::get('/memberships', AdminMemberships::class)->name('memberships');

Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket');
Route::get('/user', CreateClient::class)->name('user.create');

// Route::post('/user-store', [UserController::class, 'store'])->name('user.store');

// Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');
Route::get('/workouts', ShowDietUser::class)->name('workouts');

Route::get('/diets', ShowDietUser::class)->name('diets');
Route::get('/diets/{id}/reportPDF', [ShowDietUser::class, 'reportDiet'])->name('diets.reportDiet');
// Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');

Route::get('/analysis', ShowAnalysisUser::class)->name('analysis');

// Rutas del chat con livewire
Route::get('/users', CreateChat::class)->name('users');
Route::get('/chat/{key?}', Main::class)->name('chat');


// Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

// Route::get('chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

// Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

// Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

// Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');

// Route::get('/messages', [ChatController::class, 'received'])->name('messages');
// Route::get('/messages', ShowMessages::class)->name('messages');
