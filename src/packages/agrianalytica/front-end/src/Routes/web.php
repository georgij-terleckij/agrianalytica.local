<?php

use Illuminate\Support\Facades\Route;
use Agrianalytica\FrontEnd\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'index'])->name('front.home');


Route::get('/lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    return redirect()->back();
})->name('front.lang');
