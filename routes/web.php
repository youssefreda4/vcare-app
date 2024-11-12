<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\DoctorController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\MajorController;

Route::get('/', [HomeController::class, "index"]);
Route::get('/doctors', [DoctorController::class, "index"]);


Route::get('/contact', [ContactController::class, "index"]);
Route::post('/send-message', [ContactController::class, "sendMessage"]);

Route::get('/majors', [MajorController::class, "index"]);
Route::get('/majors/{major}/doctors', [MajorController::class, "doctors"]);

require_once ('admin.php');

