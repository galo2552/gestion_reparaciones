<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

// Login y logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (cualquier usuario autenticado)
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('reparaciones.index');
    });

    Route::resource('reparaciones', ReparacionController::class)->parameters([
        'reparaciones' => 'reparacion'
    ]);
});

// Rutas solo para admin
Route::middleware(['auth', 'es.admin'])->group(function () {
    Route::resource('usuarios', UsuarioController::class)->except(['show']);
});