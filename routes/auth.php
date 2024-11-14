<?php

use App\Http\Controllers\CustomAuth\AuthController;



Route::get('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('register', [AuthController::class, 'store'])->name('auth.store');
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
