<?php

use App\Http\Controllers\Pages\CompanyController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\SessionController;
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

Route::middleware('needToken')->get('/', [HomeController::class, 'home'])->name('home');

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'login')->name('login.form');

    Route::post('login', 'submit')->name('login.submit');

    Route::get('resetPassword', 'getEmail')->name('resetPassword.form');

    Route::post('resetPassword', 'sendToken')->name('resetPassword.submit');

    Route::get('changePassword', 'changePassword')->name('changePassword.form');

    Route::post('changePassword', 'updatePassword')->name('changePassword.submit');

    Route::get('logout', 'logout')->name('logout');
});

Route::middleware('needToken')->group(function () {

    Route::prefix('departamentos')->group(function () {
        $controller = new CompanyController('departments', 'Departamentos', 'departments', 'departamento');

        Route::get('', function () use ($controller) {
            return $controller->getAll('components.simple.all');
        })->name('departments.all');

        Route::get('{id}', function ($id) use ($controller) {
            return $controller->getOne($id, 'components.simple.one');
        })->where('id', '[0-9]+')->name('departments.one');

        Route::get('search', function (Request $request) use ($controller) {
            return $controller->search($request, 'components.simple.all');
        })->name('departments.search');

        Route::get('create', function () use ($controller) {
            return $controller->form('components.simple.form', 'un Departamento');
        })->name('departments.form');

        Route::post('create', function (Request $request) use ($controller) {
            return $controller->create('departments.all', $request, [
                'nombre' => 'required | string | between:0,40'
            ]);
        })->name('departments.submit');

        Route::delete('{id}', function ($id) use ($controller) {
            return $controller->delete($id, 'departments.all', 'components.simple.one');
        })->where('id', '[0-9]+')->name('departments.delete');

        Route::put('{id}', function ($id, Request $request) use ($controller) {
            return $controller->update($id, 'departments.one', $request, [
                'nombre' => 'sometimes | required | string | between:0,40'
            ], []);
        })->where('id', '[0-9]+')->name('departments.update');
    });

    Route::prefix('tiposEmpleados')->group(function () {
        $controller = new CompanyController('employeeTypes', 'Tipos de Empleados', 'employees-types', 'tipo_empleado');

        Route::get('', function () use ($controller) {
            return $controller->getAll('components.simple.all');
        })->name('employees-types.all');

        Route::get('{id}', function ($id) use ($controller) {
            return $controller->getOne($id, 'components.simple.one');
        })->where('id', '[0-9]+')->name('employees-types.one');

        Route::get('search', function (Request $request) use ($controller) {
            return $controller->search($request, 'components.simple.all');
        })->name('employees-types.search');

        Route::get('create', function () use ($controller) {
            return $controller->form('components.simple.form', 'un Tipo de Empleado');
        })->name('employees-types.form');

        Route::post('create', function (Request $request) use ($controller) {
            return $controller->create('employees-types.all', $request, [
                'nombre' => 'required | string | between:0,40'
            ]);
        })->name('employees-types.submit');

        Route::delete('{id}', function ($id) use ($controller) {
            return $controller->delete($id, 'employees-types.all', 'components.simple.one');
        })->where('id', '[0-9]+')->name('employees-types.delete');

        Route::put('{id}', function ($id, Request $request) use ($controller) {
            return $controller->update($id, 'employees-types.one', $request, [
                'nombre' => 'sometimes | required | string | between:0,40'
            ], []);
        })->where('id', '[0-9]+')->name('employees-types.update');
    });

    Route::prefix('unidades')->group(function () {
        $controller = new CompanyController('units', 'Unidades', 'units', 'unidad');

        Route::get('', function () use ($controller) {
            return $controller->getAll('company.units.all');
        })->name('units.all');

        Route::get('{id}', function ($id) use ($controller) {
            return $controller->getOne($id, 'company.all.one');
        })->where('id', '[0-9]+')->name('units.one');

        Route::get('search', function (Request $request) use ($controller) {
            return $controller->search($request, 'company.units.all');
        })->name('units.search');

        Route::get('create', function () use ($controller) {
            return $controller->form('company.units.form', 'una Unidad');
        })->name('units.form');

        Route::post('create', function (Request $request) use ($controller) {
            return $controller->create('units.all', $request, [
                'nombre' => 'required | string | between:0,40'
            ]);
        })->name('units.submit');

        Route::put('{id}', function ($id, Request $request) use ($controller) {
            return $controller->update($id, 'units.one', $request, [
                'nombre' => 'sometimes | required | string | between:0,40'
            ], []);
        })->where('id', '[0-9]+')->name('units.update');

        Route::delete('{id}', function ($id) use ($controller) {
            return $controller->delete($id, 'units.all', 'company.all.one');
        })->where('id', '[0-9]+')->name('units.delete');
    });
});