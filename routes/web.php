<?php

use App\Http\Livewire\Appointments\CreateAppointment;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use App\Http\Livewire\ShowDietUser;
use App\Http\Livewire\ShowAnalysisUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\Auth\CreateClient;


Route::get('/', function () {
    return view('landing-page.index');
})->name('home');

Route::get('/membresias', function () {
    return view('landing-page.memberships');
})->name('membresias');

Route::get('/servicios', function () {
    return view('landing-page.services');
})->name('servicios');

Route::get('/sucursales', function () {
    return view('landing-page.sedes');
})->name('sucursales');

Route::get('/contacto', function () {
    return view('landing-page.contact');
})->name('contacto');

// Route::get('/panel', function () {
//     return view('admin.panel');
// })->name('panel');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', ShowUsers::class)->name('dashboard');
    Route::get('/analisis', ShowAnalysisUser::class)->name('analisis');
    // Route::get('/dashboard', function(){return view('admin.dashboard');})->name('dashboard');
});

Route::get('/memberships', AdminMemberships::class)->name('memberships');

Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket');
Route::get('/user', CreateClient::class)->name('user');


// Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');
Route::get('/workouts', ShowDietUser::class)->name('workouts');

Route::get('/dietas', ShowDietUser::class)->name('dietas');
Route::get('/dietas/{id}/reporte', [ShowDietUser::class, 'reportDiet'])->name('reporte-dieta');
// Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');


// Rutas del chat con livewire
Route::get('/users', CreateChat::class)->name('users');
Route::get('/chat/{key?}', Main::class)->name('chat');

// Citas
Route::get('/citas', CreateAppointment::class)->name('citas')->middleware('auth');