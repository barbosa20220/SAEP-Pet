<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AgendamentoController;

Route::get('/', [LoginController::class, 'form'])->name('login');
Route::get('/login', [LoginController::class, 'form']);
Route::post('/entrar', [LoginController::class, 'entrar'])->name('entrar');
Route::get('/cadastro', [LoginController::class, 'cadastro'])->name('cadastro');
Route::post('/cadastro', [LoginController::class, 'registrar'])->name('registrar');

Route::middleware('auth.saep')->group(function () {
    Route::get('/inicio', fn () => view('inicio'))->name('inicio');
    Route::post('/sair', [LoginController::class, 'sair'])->name('sair');

    Route::resource('tutores', TutorController::class)->except(['show']);
    Route::resource('pets', PetController::class)->except(['show']);
    Route::resource('agendamentos', AgendamentoController::class)->except(['show']);
});
