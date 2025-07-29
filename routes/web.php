<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\AdminCoursesController;

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
    Route::post('/courses/{course}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');

    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');


    Route::get('/courses/{course}/resources', [CourseController::class, 'resources'])->name('courses.resources');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->middleware(['admin.auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Course Management
    Route::resource('courses', AdminCoursesController::class);
    
    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    
    // Enrollment Management
    Route::get('/enrollments', [AdminController::class, 'enrollments'])->name('enrollments');
    Route::delete('/enrollments/{enrollment}', [AdminController::class, 'deleteEnrollment'])->name('enrollments.delete');
});
