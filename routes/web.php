<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\HomeController;



Route::resource('properties', PropertyController::class);
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//For admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('properties', PropertyController::class)->except(['index', 'show']);
});