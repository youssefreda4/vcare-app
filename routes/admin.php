<?php

use App\Http\Controllers\Admin\MajorController;

Route::middleware('admin.area')->group(function () {
    Route::get('majors/add', [MajorController::class, "create"]);
    Route::post('majors', [MajorController::class, "store"]);
    Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
    Route::put('majors/{major}', [MajorController::class, "update"]);
    Route::delete('majors/{major}', [MajorController::class, "destory"]);
});
