<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipPaymentController;
use App\Http\Livewire\Analysis\ShowAnalysis;
use App\Http\Livewire\Appointments\ShowAppointments;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Livewire\Clients\ShowMyProgress;
use App\Http\Livewire\Clients\ShowMyPrs;
use App\Http\Livewire\Clients\ShowNutrition;
use App\Http\Livewire\Memberships\ShowSales;
use App\Http\Livewire\Routines\ShowRoutineExercises;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Memberships\AdminMemberships;
use App\Http\Livewire\Users\ShowUsers;
use App\Http\Livewire\Diets\ShowDiets;
use App\Http\Livewire\Exercises\ShowExercises;
use App\Http\Livewire\Routines\ShowRoutines;

// Landing page views
Route::middleware([
    'guest'
])->group(function () {
    Route::view('/', 'landing-page.index')->name('home');
    Route::view('/membresias', 'landing-page.memberships')->name('membresias-guest');
    Route::view('/servicios', 'landing-page.services')->name('servicios');
    Route::view('/sucursales', 'landing-page.sedes')->name('sucursales');
    Route::view('/contacto', 'landing-page.contact')->name('contacto');
    Route::get('/checkout/{precio}', [MembershipPaymentController::class, 'checkoutForm'])->name('checkout-form');
    Route::post('/checkout', [MembershipPaymentController::class, 'checkoutSave'])->name('checkout-save');
    Route::get('/payment/{precio}/{usuario}', [MembershipPaymentController::class, 'payment'])->name('payment-guest');
});


// Auth Methods
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/mi-progreso/{exercise?}', ShowMyProgress::class)->name('miProgreso')->middleware('permission:myProgress');
    Route::get('/nutrición', ShowNutrition::class)->name('nutricion')->middleware('permission:nutrition');
    Route::get('/mis-prs', ShowMyPrs::class)->name('misPrs')->middleware('permission:myPrs');

    Route::get('/inicio', ShowUsers::class)->name('dashboard')->middleware('permission:dashboard');
    Route::get('/ticket/{user}', [CreateUser::class, 'ticketUser'])->name('ticket')->middleware('permission:ticket');
    Route::get('/administrar-membresias', AdminMemberships::class)->name('membresias')->middleware('permission:memberships');
    Route::get('/ventas', ShowSales::class)->name('ventas')->middleware('permission:sales');

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

    Route::get('/membresias/checkout', [MembershipPaymentController::class, 'selectMembership'])->name('select-membership');
    Route::get('/checkout/payment/{precio}/{usuario}', [MembershipPaymentController::class, 'paymentAuth'])->name('payment-auth');

});
