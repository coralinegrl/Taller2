<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Ruta para el login general (puede ser utilizado por administradores y usuarios)


// Route::post('/login', [AuthController::class, 'login']);



//     // Ruta para el logout
//     Route::post('/logout', [AuthController::class, 'logout']);

//     // Rutas específicas para el administrador

//     Route::middleware('jwt.verify')->group(function () {
//         Route::get('/users', [AdminController::class, 'listUsers']);
//         //Route::post('/users', [AdminController::class, 'createUser']);
//         // Agrega aquí otras rutas administrativas según sea necesario
//     });


    // Rutas para operaciones de usuarios comunes
    //Route::apiResource('/users', UserController::class)->except(['store']);

Route::post('/login', [AuthController::class, 'login']);

//Route::get('/users', [AuthController::class, 'index']);


Route::middleware('jwt.verify')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
