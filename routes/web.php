<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/registro', [RegistroController::class, 'index'])->name('registro');
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.post');

//rota get api que retorna json de alunos
// Route::get('/api/alunos', [APIController::class, 'alunos'])->name('api.alunos');

Route::get('api/notas', [APIController::class, 'notas'])->name('notas.index');
Route::put('api/notas', [APIController::class, 'alterarNotas'])->name('notas.store');


Route::middleware('auth')->group(function () {
    Route::get('/listaralunos', [AlunosController::class, 'home'])->name('listarnotas');

    Route::get('/listarnotas', [ProfessorController::class, 'index'])->name('listarnotas');
    Route::post('/listarnotas', [ProfessorController::class, 'store'])->name('notas.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('professor')->group(function () {
        Route::delete('/deletar/{id}', [ProfessorController::class, 'destroy']);
    });
});
