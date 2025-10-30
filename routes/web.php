<?php

use App\Livewire\Colaborador;
use App\Livewire\ColaboradorCargo;
use App\Livewire\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Professor;
Use App\Livewire\Feriados;

//Meu primeiro contato com GitHub

// oi

Route::get('/', Home::class)->name('home');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Route::get('/colaboradores', Colaborador::class)
    ->middleware('auth')
    ->name('colaboradores');

Route::get('/cargos', ColaboradorCargo::class)
    ->middleware('auth')
    ->name('cargos');

Route::get('/professor', Professor::class)
    ->middleware('auth')
    ->name('professor');

    Route::get('/feriados', Feriados::class)
    ->middleware('auth')
    ->name('feriados');


require __DIR__.'/auth.php';
