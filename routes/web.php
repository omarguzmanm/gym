<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\DietUser;
use App\Http\Livewire\AnalysisUser;
use App\Http\Livewire\ShowDietUser;
use App\Http\Livewire\ShowAnalysisUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowUsers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

Route::get('/auth/user', function () {
    if (auth()->check()) {

        return response()->json([
            'authUser' => auth()->user()
        ]);
        return null;
    }
});



// Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');
Route::get('/workouts', ShowDietUser::class)->name('workouts');

Route::get('/diets', ShowDietUser::class)->name('diets');
Route::get('/diets/{id}/reportPDF', [ShowDietUser::class, 'reportDiet'])->name('diets.reportDiet');
// Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');

Route::get('/analysis', ShowAnalysisUser::class)->name('analysis');

Route::get('chat/{chat}', [ChatController::class, 'show'])->name('chat.show');

Route::get('chat/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');

Route::get('chat/{chat}/get_users', [ChatController::class, 'get_users'])->name('chat.get_users');

Route::get('chat/{chat}/get_messages', [ChatController::class, 'get_messages'])->name('chat.get_messages');

Route::post('message/sent', [MessageController::class, 'sent'])->name('message.sent');

