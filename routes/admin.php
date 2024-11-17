<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\MajorController;


// Route::get('majors/add', [MajorController::class, "create"]);
// Route::post('majors', [MajorController::class, "store"]);

// Route::get('majors/{major}/edit', [MajorController::class, "edit"]);
// Route::put('majors/{major}', [MajorController::class, "update"]);
// Route::delete('majors/{major}', [MajorController::class, "destory"]);

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('dashboard.home');

Route::get('/admin/majors', [MajorController::class, 'index'])->name('major.view');

Route::get('/admin/majors/add', [MajorController::class, 'create'])->name('major.create');

Route::post('/admin/majors', [MajorController::class, 'store'])->name('major.store');

Route::get('/admin/majors/{major}/edit', [MajorController::class, 'edit'])->name('major.edit');

Route::put('/admin/majors/{major}', [MajorController::class, 'update'])->name('major.update');

Route::delete('/admin/majors/{major}', [MajorController::class, 'destory'])->name('major.delete');

