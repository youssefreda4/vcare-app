<?php

use App\Http\Controllers\Admin\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\Appointment\AppointmentController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Major\MajorController;
use App\Http\Controllers\Admin\Message\MessageController;
use App\Http\Controllers\Admin\Report\ReportController;
use App\Http\Controllers\Admin\User\UserController;

// Route::get('majors/add', [MajorController::class, "create"]);
// Route::post('majors', [MajorController::class, "store"]);

// Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
// Route::put('majors/{major}', [MajorController::class, "update"]);
// Route::delete('majors/{major}', [MajorController::class, "destory"]);

Route::middleware('admin.area')->group(function () {

     Route::controller(AdminHomeController::class)->group(function () {
          Route::get('/admin/home', 'index')->name('dashboard.home');
          Route::get('/admin/home/markasread/{id}', 'markAsRead')->name('admin.notifications');
          Route::get('/admin/home/markasread/', 'markAllAsRead')->name('admin.all.notifications');
     });

     Route::controller(MessageController::class)->group(function () {
          Route::get('/admin/messages', 'index')->name('message.view');
     });

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

     Route::controller(AppointmentController::class)->group(function () {
          Route::get('/admin/appointments', 'index')->name('appointment.view');
          Route::get('/admin/appointments/{appointment}/edit', 'edit')->name('appointment.edit');
          Route::put('/admin/appointments/{appointment}', 'update')->name('appointment.update');
          Route::post('/admin/appointments/search', 'search')->name('appointment.search');
          Route::delete('/admin/appointments/{appointment}', 'destroy')->name('appointment.delete');
     });

     Route::controller(UserController::class)->group(function () {
          Route::get('/admin/users', 'index')->name('user.view');
          Route::get('/admin/users/add', 'create')->name('user.create');
          Route::post('/admin/users', 'store')->name('user.store');
          Route::get('/admin/users/{user}/edit', 'edit')->name('user.edit');
          Route::put('/admin/users/{user}', 'update')->name('user.update');
          Route::post('/admin/users/search', 'search')->name('user.search');
          Route::delete('/admin/users/{user}', 'destroy')->name('user.delete');
     });

     Route::controller(AdminController::class)->group(function () {
          Route::get('/admin/admins', 'index')->name('admin.view');
          Route::get('/admin/admins/add', 'create')->name('admin.create');
          Route::post('/admin/admins', 'store')->name('admin.store');
          Route::get('/admin/admins/{admin}/edit', 'edit')->name('admin.edit');
          Route::put('/admin/admins/{admin}', 'update')->name('admin.update');
          Route::post('/admin/admins/search', 'search')->name('admin.search');
          Route::delete('/admin/admins/{admin}', 'destroy')->name('admin.delete');
     });
     Route::controller(ReportController::class)->group(function () {
          Route::get('/admin/reports', 'index')->name('report.view');
          Route::post('/admin/reports/search', 'search')->name('report.search');
          Route::delete('/admin/report/{report}', 'destroy')->name('report.delete');
     });
});
