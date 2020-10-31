<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Render in view
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// Post form data
Route::post('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index.update');

