<?php

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('needToken')->get('/', [HomeController::class, 'home'])->name('home');

Route::view('/unauth', 'general.unauthorized')->name('unauthorized');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login.form');

    Route::post('login', 'submit')->name('login.submit');
});