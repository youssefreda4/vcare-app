<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\DoctorController;

Route::middleware('doctor.area')->group(function () {

    Route::controller(DoctorController::class)->group(function () {
        Route::get('/doctor/home', 'index')->name('doctor.appointment.view');
        Route::get('/doctor/report/{patient}', 'create')->name('doctor.report.create');
        Route::post('/doctor/report/{patient}', 'store')->name('doctor.report.store');
    });
    
});
