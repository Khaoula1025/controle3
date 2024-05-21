<?php

use App\Http\Controllers\courseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/courses', [courseController::class, 'getCourses']);
