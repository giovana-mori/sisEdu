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

Route::get('api/notas', [APIController::class, 'notas'])->name('notas.index');
Route::put('api/notas', [APIController::class, 'alterarNotas'])->name('notas.store');
Route::delete('api/notas/{id}', [APIController::class, 'deletarNota'])->name('notas.destroy');

Route::delete('api/alunos/{id}', [APIController::class, 'deletarAluno'])->name('alunos.destroy');

Route::middleware('auth')->group(function () {
    Route::middleware('professor')->group(function () {
        Route::get('/listaralunos', [AlunosController::class, 'index'])->name('aluno.index');
        Route::get('/alunos/editar/{id}', [AlunosController::class, 'show'])->name('aluno.edit');
        Route::post('/alunos/editar/{id}', [AlunosController::class, 'update'])->name('aluno.update');
        Route::get('/listarnotas', [ProfessorController::class, 'index'])->name('listarnotas');
        Route::post('/listarnotas', [ProfessorController::class, 'store'])->name('notas.store');
    });

    Route::middleware('aluno')->group(function () {
        Route::get('/minhasnotas', [ProfessorController::class, 'index'])->name('minhasnotas');
        Route::get('/perfil/editar/{id}', [AlunosController::class, 'show'])->name('perfil.edit');
        Route::post('/perfil/editar/{id}', [AlunosController::class, 'update'])->name('perfil.update');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
