<?php

use Illuminate\Support\Facades\Route;
use Agrianalytica\Admin\Http\Controllers\AdminController;
use Agrianalytica\Admin\Http\Controllers\RoleController;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Управление ролями

    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::put('/roles/{role}', [RoleController::class, 'store'])->name('admin.roles.update');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermission'])->name('admin.roles.assignPermissions');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
});
