<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\MajorController;
use App\Http\Controllers\api\v1\DoctorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('api/v1/majors',[MajorController::class,'index']);
Route::get('api/v1/majors/{id}',[MajorController::class,'show']);
Route::get('api/v1/majors/{id}/doctors',[MajorController::class,'doctors']);

Route::get('api/v1/doctors',[DoctorController::class,'index']);

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//must you make login 
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');