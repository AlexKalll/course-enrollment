<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', [CourseController::class, 'showAllCourses'])->name('home');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CourseController::class, 'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');


    Route::get('/courses/{course}/resources', [CourseController::class, 'resources'])->name('courses.resources');
});
