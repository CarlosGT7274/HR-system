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

/**
 * Create a new controller instance whit all the routes necessary.
 *
 * @param string $prefix Route prefix for all endpoints
 * @param string $endpoint API endpoint for the request
 * @param string $url_name Base name for all the endpoints 
 * @param string $title Page title 
 * @param string $id_name Name id after the id_ in the data base
 * @param string $form_title Title for the creation form
 * @param array $validation_rules Rules for the request validation
 * @param array $changes Changes should perform to the request for the API 
 * @return void
 */
function SimpleRoutes($prefix, $endpoint, $url_name, $title, $id_name, $form_title, $validation_rules, $changes = [], $employeesForForm = false)
{
    Route::prefix($prefix)->group(function () use ($endpoint, $url_name, $title, $id_name, $form_title, $validation_rules, $changes, $employeesForForm) {
        $controller = new CompanyController('company/' . session('company'), $endpoint, $title, $url_name, $id_name);

        Route::get('', function () use ($controller) {
            return $controller->getAll();
        })->name($url_name . '.all');

        Route::get('{id}', function ($id) use ($controller) {
            return $controller->getOne($id);
        })->where('id', '[0-9]+')->name($url_name . '.one');

        Route::get('search', function (Request $request) use ($controller) {
            return $controller->search($request);
        })->name($url_name . '.search');

        Route::get('create', function () use ($controller, $form_title, $employeesForForm) {
            return $controller->form($form_title, $employeesForForm);
        })->name($url_name . '.form');

        Route::post('create', function (Request $request) use ($controller, $validation_rules, $changes) {
            return $controller->create($request, $validation_rules, $changes);
        })->name($url_name . '.submit');

        Route::put('{id}', function ($id, Request $request) use ($controller, $validation_rules, $changes) {
            return $controller->update($id, $request, $validation_rules, $changes);
        })->where('id', '[0-9]+')->name($url_name . '.update');

        Route::delete('{id}', function ($id) use ($controller) {
            return $controller->delete($id);
        })->where('id', '[0-9]+')->name($url_name . '.delete');
    });
}


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
    SimpleRoutes(
        'departamentos',
        'departments',
        'departments',
        'Departamentos',
        'departamento',
        'un Departamento',
        [
            'nombre' => 'required | string | between:0,40'
        ]
    );

    SimpleRoutes(
        'tipos-empleados',
        'employeeTypes',
        'employees-types',
        'Tipos de Empleados',
        'tipo_empleado',
        'un Tipo de Empleado',
        [
            'nombre' => 'required | string | between:0,40'
        ]
    );

    SimpleRoutes(
        'unidades',
        'units',
        'units',
        'Unidades',
        'unidad',
        'una Unidad',
        [
            'nombre' => 'required | string',
            'tipo' => 'required | string',
            'población' => 'required | string',
            'estado' => 'required | integer | between:1,32',
            'región' => 'sometimes | required | string',
        ],
        [
            'población' => 'poblacion',
            'región' => 'region',
            'estado' => 'int'
        ]
    );

    SimpleRoutes(
        'puestos',
        'positions',
        'positions',
        'Puestos',
        'puesto',
        'un Puesto',
        [
            'nombre' => 'required | string',
            'sueldo_sugerido' => 'required | decimal:0,6 | min:0',
            'sueldo_máximo' => 'required | decimal:0,6 | min:0',
            'clave' => 'required | integer | between:1,5',
        ],
        [
            'sueldo_sugerido' => 'sueldoSug',
            'sueldo_máximo' => 'sueldoMax',
            'clave' => 'riesgo'
        ]
    );

    SimpleRoutes(
        'dias-feriados',
        'holidays',
        'holidays',
        'Días Feriados',
        'dia_feriado',
        'un Día Feriado',
        [
            'nombre' => 'required | string',
            'tipo' => 'required | integer | between:0,1',
            'inicio' => 'required | date | date_format:Y-m-d',
            'fin' => 'required | date | after_or_equal:inicio',
        ],
        [
            'tipo' => 'int'
        ]
    );

    SimpleRoutes(
        'codigos-de-pago',
        'payCodes',
        'pay-codes',
        'Códigos de Pago',
        'codigo_pago',
        'un Código de Pago',
        [
            'descripción' => 'required | string',
            'número_de_percepción' => 'required | string',
            'siglas' => 'required | string',
            'tipo' => 'required | integer | min:1',
        ],
        [
            'tipo' => 'int',
            'descripción' => 'descripcion',
            'número_de_percepción' => 'codexport',
            'abreviatura' => 'siglas'
        ]
    );

    SimpleRoutes(
        'horarios',
        'schedules',
        'schedules',
        'Horarios',
        'horario',
        'un Horario',
        [
            'descripción' => 'required | string',
            'incluye_hora_de_comida' => 'required | integer | between:0,1',
            'estado' => 'required | integer | between:0,1',
            'detalles' => 'required | array | size:7',
            'detalles.*.día' => 'required | integer | between:1,7',
            'detalles.*.inicio' => 'required | date_format:H:i:s',
            'detalles.*.fin' => 'required | date_format:H:i:s',
            'detalles.*.toleranciaIn' => 'integer | min:0',
            'detalles.*.toleranciaFin' => 'integer | min:0',
            'detalles.*.tipo' => 'required | integer | between:0,1'
        ],
        [
            'descripción' => 'descripcion',
            'incluye_hora_de_comida' => 'conComida',
            'día' => 'dia',
            'conComida' => 'int',
            'dia' => 'int',
            'estado' => 'int',
            'tipo' => 'int',
            'toleranciaIn' => 'int',
            'toleranciaFin' => 'int'
        ]
    );

    SimpleRoutes(
        'capacitaciones',
        'trainings',
        'trainings',
        'Capacitaciones',
        'capacitacion',
        'una Capacitación',
        [
            'nombre' => 'required | string',
            'descripción' => 'sometimes | required | string',
            'empleados' => 'array',
            'empleados.*.id_empleado' => 'integer | min:1 | exists:hr_empleados,id_empleado',
            'empleados.*.fecha' => 'date | date_format:Y-m-d'
        ],
        [
            'descripción' => 'descripcion',
            'id_empleado' => 'int',
        ],
        true
    );
});
