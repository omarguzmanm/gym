<?php

use App\Http\Livewire\DietUser;
use App\Http\Livewire\AnalysisUser;
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

Route::get('/diets', DietUser::class)->name('diets');
Route::post('/diets', [DietUser::class, 'store'])->name('diets.store');

Route::get('/analysis', AnalysisUser::class)->name('analysis');
Route::post('/analysis', [AnalysisUser::class, 'submit'])->name('analysis.submit');


