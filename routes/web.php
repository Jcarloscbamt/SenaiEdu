<?php

use App\Livewire\Colaborador;
use App\Livewire\ColaboradorCargo;
use App\Livewire\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Meu primeiro contato com GitHub


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

require __DIR__.'/auth.php';
