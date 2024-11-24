<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\MajorController;


// Route::get('majors/add', [MajorController::class, "create"]);
// Route::post('majors', [MajorController::class, "store"]);

// Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
// Route::put('majors/{major}', [MajorController::class, "update"]);
// Route::delete('majors/{major}', [MajorController::class, "destory"]);

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('dashboard.home');

Route::controller(MajorController::class)->group(function () {
    Route::get('/admin/majors', 'index')->name('major.view');
    Route::get('/admin/majors/add', 'create')->name('major.create');
    Route::post('/admin/majors', 'store')->name('major.store');
    Route::get('/admin/majors/{major}/edit', 'edit')->name('major.edit');
    Route::put('/admin/majors/{major}', 'update')->name('major.update');
    Route::delete('/admin/majors/{major}', 'destory')->name('major.delete');
});
