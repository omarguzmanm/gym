<?php

use App\Http\Controllers\MembershipPayment;
use App\Http\Controllers\MyProgressController;
use App\Http\Livewire\Analysis\ShowAnalysis;
use App\Http\Livewire\Appointments\ShowAppointments;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\Memberships\ShowSales;
use App\Http\Livewire\Routines\ShowRoutineExercises;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\ShowUsers;
use App\Http\Livewire\Users\CreateClient;
use App\Http\Livewire\Diets\ShowDiets;
use App\Http\Livewire\Exercises\ShowExercises;
use App\Http\Livewire\Routines\ShowRoutines;
use App\Http\Livewire\Users\MyProgressShow;

// Landing page views
Route::middleware([
    'guest'
])->group(function () {
    Route::view('/', 'landing-page.index')->name('home');
    Route::view('/membresias', 'landing-page.memberships')->name('membresias-guest');
    Route::view('/servicios', 'landing-page.services')->name('servicios');
    Route::view('/sucursales', 'landing-page.sedes')->name('sucursales');
    Route::view('/contacto', 'landing-page.contact')->name('contacto');
    Route::get('/checkout/{precio}', [MembershipPayment::class, 'checkoutForm'])->name('checkout-form');
    Route::post('/checkout', [MembershipPayment::class, 'checkoutSave'])->name('checkout-save');
    Route::get('/payment/{precio}/{usuario}', [MembershipPayment::class, 'payment'])->name('payment');
});

// Auth Methods
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/inicio', ShowUsers::class)->name('dashboard');
    Route::get('/mi-progreso', MyProgressShow::class)->name('miProgreso')->middleware('permission:myProgress');
    Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket')->middleware('permission:ticket');
    Route::get('/administrar-membresias', AdminMemberships::class)->name('membresias')->middleware('permission:memberships');
    Route::get('/ventas', ShowSales::class)->name('ventas');

    Route::get('/citas', ShowAppointments::class)->name('citas')->middleware('permission:appointments');
    Route::get('/analisis', ShowAnalysis::class)->name('analisis')->middleware('permission:analysis');
    Route::get('/analisis/{id}/report', [ShowAnalysis::class, 'reportAnalysis'])->name('reporte-analisis')->middleware('permission:analysis-report');

    Route::get('/dietas', ShowDiets::class)->name('dietas')->middleware('permission:diets');
    Route::get('/dietas/{id}/reporte', [ShowDiets::class, 'reportDiet'])->name('reporte-dieta')->middleware('permission:diets-report');

    Route::get('/rutinas', ShowRoutines::class)->name('rutinas')->middleware('permission:routines');
    Route::get('/rutina/{id}', ShowRoutineExercises::class)->name('rutina-seleccionada')->middleware('permission:routines');
    Route::get('/ejercicios', ShowExercises::class)->name('ejercicios')->middleware('permission:exercises');

    Route::get('/usuarios', CreateChat::class)->name('users')->middleware('permission:users');
    Route::get('/chat/{key?}', Main::class)->name('chat')->middleware('permission:chat');
});
