<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\MajorController;
use App\Http\Controllers\front\DoctorController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\AppointmentController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/doctors', [DoctorController::class, "index"])->name('doctors.view');


Route::get('/contact', [ContactController::class, "index"]);
Route::post('/send-message', [ContactController::class, "sendMessage"]);

Route::get('/majors', [MajorController::class, "index"]);
Route::get('/majors/{major}/doctors', [MajorController::class, "doctors"]);

Route::middleware('auth')->group(function () {
    route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.view');
    route::get('/appointments/{doctor}', [AppointmentController::class, 'create'])->name('appointments.create');
    route::post('/appointments/{doctor}', [AppointmentController::class, 'store'])->name('appointments.store');
});

require_once ('admin.php');
require_once (__DIR__.'/auth.php');

