<?php

use App\Http\Livewire\Appointments\ShowAppointments;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\CreateUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use App\Http\Livewire\ShowAnalysisUser;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowUsers;
use App\Http\Livewire\Auth\CreateClient;
use App\Http\Livewire\Diets\ShowDiets;
use App\Http\Livewire\Exercises\ShowExercises;
use App\Http\Livewire\Routines\ShowRoutines;

// Landing page views
Route::view('/', 'landing-page.index')->name('home');
Route::view('/membresias', 'landing-page.memberships')->name('membresias');
Route::view('/servicios', 'landing-page.services')->name('servicios');
Route::view('/sucursales', 'landing-page.sedes')->name('sucursales');
Route::view('/contacto', 'landing-page.contact')->name('contacto');


// Auth Methods
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', ShowUsers::class)->name('dashboard');
    Route::get('/analisis', ShowAnalysisUser::class)->name('analisis');
    Route::get('/dietas', ShowDiets::class)->name('dietas');
    Route::get('/dietas/{id}/reporte', [ShowDiets::class, 'reportDiet'])->name('reporte-dieta');

    Route::get('/membresias', AdminMemberships::class)->name('membresias');
    Route::get('/citas', ShowAppointments::class)->name('citas');
    Route::get('/rutinas', ShowRoutines::class)->name('rutinas');
    Route::get('/ejercicios', ShowExercises::class)->name('ejercicios');
    Route::get('/users', CreateChat::class)->name('users');
    Route::get('/chat/{key?}', Main::class)->name('chat');
}); 


Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket');
Route::get('/user', CreateClient::class)->name('user');


// Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');
// Route::get('/workouts', ShowDietUser::class)->name('workouts');

// Route::get('/dietas', ShowDietUser::class)->name('dietas');
// Route::get('/dietas/{id}/reporte', [ShowDietUser::class, 'reportDiet'])->name('reporte-dieta');
// Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');



// Citas
// Route::get('/citas', CreateAppointment::class)->name('citas')->middleware('guest');
// Route::get('/showCitas', ShowAppointments::class)->name('show-citas')->middleware('auth');