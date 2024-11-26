<?php

use App\Http\Controllers\Api\V1\MajorController;

Route::get('api/v1/majors',[MajorController::class,'index']);