<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Notifications\CustomResetPassword;
use Illuminate\Support\Facades\Route;



// auth routes - user not logged in
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/registerSubmit', [AuthController::class, 'registerSubmit'])->name('register.submit');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');

    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');    
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
    

});

// auth routes - user logged in
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


