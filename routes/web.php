<?php

use App\Http\Livewire\Analysis\ShowAnalysis;
use App\Http\Livewire\Appointments\ShowAppointments;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\ShowUsers;
use App\Http\Livewire\Users\CreateClient;
use App\Http\Livewire\Diets\ShowDiets;
use App\Http\Livewire\Exercises\ShowExercises;
use App\Http\Livewire\Routines\ShowRoutines;

// Landing page views
Route::middleware([
    'guest'
])->group(function () {
    Route::view('/', 'landing-page.index')->name('home');
    Route::view('/membresias', 'landing-page.memberships')->name('membresias');
    Route::view('/servicios', 'landing-page.services')->name('servicios');
    Route::view('/sucursales', 'landing-page.sedes')->name('sucursales');
    Route::view('/contacto', 'landing-page.contact')->name('contacto');

    // Route::get('/nuevo-usuario', CreateClient::class)->name('nuevo-usuario');
});

// Auth Methods
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // 'redirectbyrole'
])->group(function () {
    Route::get('/', ShowUsers::class)->name('dashboard');
    Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket')->middleware('permission:ticket');
    Route::get('/membresias', AdminMemberships::class)->name('membresias')->middleware('permission:memberships');

    Route::get('/citas', ShowAppointments::class)->name('citas')->middleware('permission:appointments');
    Route::get('/analisis', ShowAnalysis::class)->name('analisis')->middleware('permission:analysis');
    Route::get('/analisis/{id}/report', [ShowAnalysis::class, 'reportAnalysis'])->name('reporte-analisis')->middleware('permission:analysis-report');

    Route::get('/dietas', ShowDiets::class)->name('dietas')->middleware('permission:diets');
    Route::get('/dietas/{id}/reporte', [ShowDiets::class, 'reportDiet'])->name('reporte-dieta')->middleware('permission:diets-report');

    Route::get('/rutinas', ShowRoutines::class)->name('rutinas')->middleware('permission:routines');
    Route::get('/ejercicios', ShowExercises::class)->name('ejercicios')->middleware('permission:exercises');

    Route::get('/usuarios', CreateChat::class)->name('users')->middleware('permission:users');
    Route::get('/chat/{key?}', Main::class)->name('chat')->middleware('permission:chat');
});




// Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');
// Route::get('/workouts', ShowDietUser::class)->name('workouts');

// Route::get('/dietas', ShowDietUser::class)->name('dietas');
// Route::get('/dietas/{id}/reporte', [ShowDietUser::class, 'reportDiet'])->name('reporte-dieta');
// Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');



// Citas
// Route::get('/citas', CreateAppointment::class)->name('citas')->middleware('guest');
// Route::get('/showCitas', ShowAppointments::class)->name('show-citas')->middleware('auth');