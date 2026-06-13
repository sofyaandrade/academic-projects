<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AvaliacaoFisicaController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('alunos', AlunoController::class);
    Route::resource('avaliacoes', AvaliacaoFisicaController::class);
});

require __DIR__.'/auth.php';
