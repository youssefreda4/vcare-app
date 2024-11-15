<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\MajorController;


// Route::get('majors/add', [MajorController::class, "create"]);
// Route::post('majors', [MajorController::class, "store"]);

// Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
// Route::put('majors/{major}', [MajorController::class, "update"]);
// Route::delete('majors/{major}', [MajorController::class, "destory"]);

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('home');

Route::get('/admin/majors', [MajorController::class, 'index'])->name('major.view');

Route::get('/admin/majors/add', [MajorController::class, 'create'])->name('major.create');

Route::post('/admin/majors', [MajorController::class, 'store'])->name('major.store');
