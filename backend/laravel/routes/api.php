<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Ruta para el login general (puede ser utilizado por administradores y usuarios)
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    // Ruta para el logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rutas específicas para el administrador
    Route::prefix('admin')->middleware('is_admin')->group(function () {
        Route::get('/users', [AdminController::class, 'listUsers']);
        Route::post('/users', [AdminController::class, 'createUser']);
        // Agrega aquí otras rutas administrativas según sea necesario
    });

    // Rutas para operaciones de usuarios comunes
    Route::apiResource('/users', UserController::class)->except(['store']);
});
