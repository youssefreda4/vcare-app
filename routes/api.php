<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Front\Appointment\AppointmentController;
use App\Http\Controllers\Api\V1\Front\Contact\ContactController;
use App\Http\Controllers\Api\V1\Front\Home\HomeController;
use App\Http\Controllers\Api\V1\Front\Major\MajorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/api/v1/home', [HomeController::class, 'index']);

Route::post('/api/v1/contact', [ContactController::class, 'sendMessage']);

Route::get('/api/v1/majors', [MajorController::class, 'index']);
Route::get('/api/v1/majors/{id}/doctors', [MajorController::class, 'doctors']);

Route::get('/api/v1/doctors', [MajorController::class, 'index']);

route::get('/api/v1/appointments', [AppointmentController::class, 'index'])->middleware('auth:sanctum');
route::get('/api/v1/appointments/{doctor}', [AppointmentController::class, 'create']);
route::post('/api/v1/appointments/{doctor}', [AppointmentController::class, 'store'])->middleware('auth:sanctum');
