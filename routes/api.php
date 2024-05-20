<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\travaux3DController;
use App\Http\Controllers\travauxCadastreController;
use App\Http\Controllers\travauxIfeController;
use App\Http\Controllers\travauxTopographiqueController;
use App\Http\Controllers\UserController;
use App\Models\travaux_cadastre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses', [courseController::class, 'index']);
