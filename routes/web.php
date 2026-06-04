<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReparacionController;

Route::get('/', function () {
    return redirect()->route('reparaciones.index');
});

// Esto genera index, create, store, edit, update, show y destroy
Route::resource('reparaciones', ReparacionController::class);
