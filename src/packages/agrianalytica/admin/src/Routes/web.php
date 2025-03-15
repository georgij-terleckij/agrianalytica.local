<?php

use Illuminate\Support\Facades\Route;
use Agrianalytica\Admin\Http\Controllers\AdminController;
use Agrianalytica\Admin\Http\Controllers\RoleController;
use Agrianalytica\Admin\Http\Controllers\LandManagerController;
use Agrianalytica\Admin\Http\Controllers\AuthController;

Route::prefix('admin')->middleware('web')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');


    Route::middleware(['auth:employee'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
        Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

        // Управление клиентами (LandManagers) — без `Route::resource()`
        Route::prefix('land-managers')->group(function () {
            Route::get('/', [LandManagerController::class, 'index'])->name('admin.land-managers.index');
            Route::get('/create', [LandManagerController::class, 'create'])->name('admin.land-managers.create');
            Route::post('/', [LandManagerController::class, 'store'])->name('admin.land-managers.store');
            Route::get('/{uuid}', [LandManagerController::class, 'show'])->name('admin.land-managers.show');
            Route::get('/{uuid}/edit', [LandManagerController::class, 'edit'])->name('admin.land-managers.edit');
            Route::put('/{uuid}', [LandManagerController::class, 'update'])->name('admin.land-managers.update');
            Route::delete('/{uuid}', [LandManagerController::class, 'destroy'])->name('admin.land-managers.destroy');
            Route::post('/bulk-delete', [LandManagerController::class, 'bulkDelete'])->name('admin.land-managers.bulk-delete');
            Route::post('/bulk-ban', [LandManagerController::class, 'bulkBan'])->name('admin.land-managers.bulk-ban');
            Route::post('/bulk-unban', [LandManagerController::class, 'bulkUnban'])->name('admin.land-managers.bulk-unban');
        });
    });
});
