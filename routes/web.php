<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// auth routes - user not logged in
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/registerSubmit', [AuthController::class, 'registerSubmit'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
});

// auth routes - user logged in
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});

