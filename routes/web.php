<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class,'login'])->name('login.post');

Route::get('/registro',[\App\Http\Controllers\RegistroController::class, 'index'])->name('registro');
Route::post('/registro',[\App\Http\Controllers\RegistroController::class, 'store'])->name('registro.post');

Route::get('/dashboard', function ()
{
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::get('aluno/dashboard', function ()
{
    return view('dashboardAluno');
})->name('dashboardAluno')->middleware('auth');

