<?php

use App\Http\Controllers\front\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\DoctorController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\MajorController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/doctors', [DoctorController::class, "index"])->name('doctors.view');

Route::middleware('auth')->group(function () {
    route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.view');
    route::get('/appointments/{user}', [AppointmentController::class, 'create'])->name('appointments.create');
    route::post('/appointments/{user}', [AppointmentController::class, 'store'])->name('appointments.store');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', "index")->name('contact.view');
    Route::post('/send-message', "sendMessage")->name('contact.store');
});

Route::controller(MajorController::class)->group(function () {
    Route::get('/majors', "index")->name('majors.view');
    Route::get('/majors/{major}/doctors', "doctors")->name('majors.doctors.view');
});

require_once(__DIR__ . '/admin.php');
require_once(__DIR__ . '/auth.php');
require_once(__DIR__ . '/api-old.php');
