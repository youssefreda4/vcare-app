<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuth\AuthController;
use App\Http\Controllers\CustomAuth\AuthLoginController;



Route::get('login', [AuthLoginController::class, 'login'])->name('login');
Route::post('login', [AuthLoginController::class, 'store'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'store'])->name('auth.store');
Route::post('logout', [AuthLoginController::class, 'logout'])->name('auth.logout');
