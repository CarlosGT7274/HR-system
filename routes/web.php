<?php

use App\Http\Controllers\Pages\CompanyController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\SessionController;
use App\Http\Controllers\Pages\systemController;
use Illuminate\Http\Request;
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
Route::middleware('needToken')->controller(HomeController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::post('/', 'graph')->name('attendance.graph');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'login')->name('login.form');
    
    Route::post('login', 'submit')->name('login.submit');
    
    Route::get('resetPassword', 'getEmail')->name('resetPassword.form');
    
    Route::post('resetPassword', 'sedToken')->name('resetPassword.submit');
    Route::get('changePassword', 'changePassword')->name('changePassword.form');
    
    Route::post('changePassword', 'updatePassword')->name('changePassword.submit');
    
    Route::post('logout', 'logout')->name('logout');
});

Route::middleware('needToken')->group(function () {

    Route::prefix('departments')->group(function () {
        $controller = new CompanyController('departments', 'Departamentos');

        Route::get('', function () use ($controller) {
            return $controller->getAll('company.departments.all');
        })->name('departments.all');

        Route::get('{id}', function ($id) use ($controller) {
            return $controller->getOne($id, 'company.departments.one');
        })->where('id', '[0-9]+')->name('departments.one');

        Route::get('create', function () use ($controller) {
            return $controller->form('company.departments.form');
        })->name('departments.form');

        Route::post('create', function (Request $request) use ($controller) {
            return $controller->create('departments.all', $request, [
                'nombre' => 'required | string | between:0,40'
            ]);
        })->name('departments.submit');

        Route::delete('{id}', function ($id) use ($controller) {
            // return $id;
            return $controller->delete($id, 'departments.all');
        })->where('id', '[0-9]+')->name('departments.delete');

        Route::put('{id}', function ($id) use ($controller) {
            // return $controller->update($id, 'departments.all');
        })->where('id', '[0-9]+')->name('departments.delete');
    });
});

Route::middleware('needToken')->group(function () {
    Route::prefix('Perfiles')->group(function () {
        $controll = new systemController('Perfiles', 'Perfiles');

        Route::get('', function () use ($controll) {
            return $controll->getviewAll('system.roles.admincrud');
        } );   
    });
});