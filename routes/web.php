<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/enroll', [studentController::class, 'enroll'])->name('enroll');
Route::get('/', [studentController::class, 'index'])->name('index');
Route::get('/{id}', [studentController::class, 'show'])->name('show');
Route::post('/enroll/{id}', [studentController::class, 'enroll'])->name('enroll');
Route::delete('/{id}/destroy', [studentController::class, 'destroy'])->name('destroy');
//Route::get('/{id}/edit', [studentController::class, 'edit'])->name('edit');

// Route for editing the course enrollment
Route::get('/{id}/{course_id}/edit', [studentController::class, 'edit'])->name('edit');
Route::put('/{id}/{course_id}', [studentController::class, 'update'])->name('update');
Route::get('/enroll/form/{id}', function ($id) {
    return view('create', ['student_id' => $id]);
})->name('enroll.form');
//Routes for courses 
Route::get('/courses/{id}/students', [courseController::class, 'students'])->name('courses');
Route::resource('courses', CourseController::class);
