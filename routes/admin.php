<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Appointment\AppointmentController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Major\MajorController;


// Route::get('majors/add', [MajorController::class, "create"]);
// Route::post('majors', [MajorController::class, "store"]);

// Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
// Route::put('majors/{major}', [MajorController::class, "update"]);
// Route::delete('majors/{major}', [MajorController::class, "destory"]);

Route::middleware('admin.area')->group(function () {
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('dashboard.home');
    Route::controller(MajorController::class)->group(function () {
        Route::get('/admin/majors', 'index')->name('major.view');
        Route::get('/admin/majors/add', 'create')->name('major.create');
        Route::post('/admin/majors', 'store')->name('major.store');
        Route::post('/admin/majors/search', 'search')->name('major.search');
        Route::get('/admin/majors/{major}/edit', 'edit')->name('major.edit');
        Route::put('/admin/majors/{major}', 'update')->name('major.update');
        Route::delete('/admin/majors/{major}', 'destroy')->name('major.delete');
    });

    Route::controller(DoctorController::class)->group(function () {
        Route::get('/admin/doctors', 'index')->name('doctor.view');
        Route::get('/admin/doctors/add', 'create')->name('doctor.create');
        Route::post('/admin/doctors', 'store')->name('doctor.store');
        Route::post('/admin/doctors/search', 'search')->name('doctor.search');
        Route::get('/admin/doctors/{doctor}/edit', 'edit')->name('doctor.edit');
        Route::put('/admin/doctors/{doctor}', 'update')->name('doctor.update');
        Route::delete('/admin/doctors/{doctor}', 'destroy')->name('doctor.delete');
    });

   Route::controller(AppointmentController::class)->group(function(){
        Route::get('/admin/appointments','index')->name('appointment.view');
        Route::get('/admin/appointments/{appointment}/edit','edit')->name('appointment.edit');
        Route::put('/admin/appointments/{appointment}','update')->name('appointment.update');
        Route::post('/admin/appointments/search','search')->name('appointment.search');
        Route::delete('/admin/appointments/{appointment}','destroy')->name('appointment.delete');
   });
});
