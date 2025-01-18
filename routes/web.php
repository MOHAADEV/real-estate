<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;



Route::resource('properties', PropertyController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
