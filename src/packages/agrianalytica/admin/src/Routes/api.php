<?php

use Agrianalytica\Admin\Http\Controllers\API\AuthAPIController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::post('login', [AuthAPIController::class, 'login']);
    Route::post('logout', [AuthAPIController::class, 'logout'])->middleware('auth:employee_api');
    Route::post('refresh', [AuthAPIController::class, 'refresh'])->middleware('auth:employee_api');
    Route::get('me', [AuthAPIController::class, 'me'])->middleware('auth:employee_api');
});
