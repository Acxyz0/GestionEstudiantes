<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Estudiantes
Route::resource('estudiantes', EstudianteController::class);

// Bitacora
Route::resource('bitacora', BitacoraController::class);
