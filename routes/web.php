<?php

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\SessionController;
use App\Http\Controllers\Pages\EmployeesController;
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

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'login')->name('login.form');

    Route::post('login', 'submit')->name('login.submit');

    Route::get('resetPassword', 'getEmail')->name('resetPassword.form');

    Route::post('resetPassword', 'sedToken')->name('resetPassword.submit');
});
Route::middleware(['auth:api', 'needToken'])-> group(function () {
    
    Route::controller(EmployeesController::class)->group(function () {
        Route::get('login', 'login')->name('login.form');
    
        Route::post('login', 'submit')->name('login.submit');
    
        Route::get('resetPassword', 'getEmail')->name('resetPassword.form');
    
        Route::post('resetPassword', 'sedToken')->name('resetPassword.submit');
    });
});