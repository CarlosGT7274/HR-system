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

/**
 * Create a new controller instance whit all the routes necessary.
 *
 * @param string $prefix Route prefix for all endpoints
 * @param string $uri_prefix API endpoint for the request
 * @param string $extraId Extra Id for the API endpoint
 * @param string $uri_suffix API endpoint for the request
 * @param string $url_name Base name for all the endpoints 
 * @param string $title Page title 
 * @param string $id_name Name id after the id_ in the data base
 * @param string $form_title Title for the creation form
 * @param array $validation_rules Rules for the request validation
 * @param array $changes Changes should perform to the request for the API 
 * @return void
 */
function SimpleRoutes($prefix, $uri_prefix, $extraId, $uri_suffix, $url_name, $title, $id_name, $form_title, $validation_rules, $changes = [], $employeesForForm = false)
{
    Route::prefix($prefix)->group(function () use ($uri_prefix, $extraId, $uri_suffix, $url_name, $title, $id_name, $form_title, $validation_rules, $changes, $employeesForForm) {

        $controller = new CompanyController($uri_prefix, $extraId, $uri_suffix, $title, $url_name, $id_name);

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


Route::middleware('needToken')->controller(HomeController::class)->group(function (){
    Route::get('/', 'home')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard.show');
    Route::post('/dashboard', 'graph')->name('attendance.graph');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('login', 'login')->name('login.form');
    
    Route::post('login', 'submit')->name('login.submit');
    
    Route::get('resetPassword', 'getEmail')->name('resetPassword.form');
    
    Route::post('resetPassword', 'sedToken')->name('resetPassword.submit');
    Route::get('changePassword', 'changePassword')->name('changePassword.form');
    
    Route::post('changePassword', 'updatePassword')->name('changePassword.submit');

    Route::get('logout', 'logout')->name('logout');
});

Route::middleware('needToken')->group(function () {
    SimpleRoutes(
        'departamentos',
        'companies',
        'company',
        'departments',
        'company.departments',
        'Departamentos',
        'departamento',
        'un Departamento',
        [
            'nombre' => 'required | string | between:0,40'
        ]
    );

    SimpleRoutes(
        'tipos-empleados',
        'companies',
        'company',
        'employeeTypes',
        'company.employees-types',
        'Tipos de Empleados',
        'tipo_empleado',
        'un Tipo de Empleado',
        [
            'nombre' => 'required | string | between:0,40'
        ]
    );

    SimpleRoutes(
        'unidades',
        'companies',
        'company',
        'units',
        'company.units',
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
        'companies',
        'company',
        'positions',
        'company.positions',
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
        'companies',
        'company',
        'holidays',
        'company.holidays',
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
        'companies',
        'company',
        'payCodes',
        'company.pay-codes',
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
        'companies',
        'company',
        'schedules',
        'company.schedules',
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
        'companies',
        'company',
        'trainings',
        'company.trainings',
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

    SimpleRoutes(
        'permisos',
        'privileges',
        '',
        '',
        'system.permisos',
        'Permisos',
        'permiso',
        'un Permiso',
        [
            'clave'=> 'required | integer | min:0',
            'nombre_del_permiso' => 'required | string',
            'clave_del_padre' => 'required | integer | exists:sys_permisos,id_permiso',
            'endpoint' => 'required | string',
            'activo' => 'required | integer | between:0,1',
        ],
        [
            'nombre_del_permiso' => 'nombre',
            'clave' => 'id_permiso',
            'clave_del_padre'=> 'padre',
            'activo' => 'int',
            'padre' => 'int'
        ]

    );

    SimpleRoutes(
        'empresas',
        'companies',
        '',
        '',
        'system.companies',
        'Empresas',
        'empresa',
        'Nueva Empresa',
        [
            'razón_social' => 'required | string | min:1',
            'rfc' => 'required | string | min:1 | max:13',
            'giro_comercial' => 'required | string | min:1',
            'contacto' => 'required | string | min:1',
            'teléfono' => 'required | string | min:1 | max:10',
            'email' => 'required | string | min:1 | email',
            'fax' => 'nullable | string | min:1',
            'web' => 'nullable | string | min:1',
            'calle' => 'required | string | min:1',
            'colonia' => 'required | string | min:1',
            'población' => 'required | string | min:1',
            'estado' => 'required | integer',
            'logo' => 'nullable | string | min:1'
        ],
        [
            "razón_social" => 'razonSocial',
            "giro_comercial" => 'giroComercial',
            'teléfono' => 'telefono',
            'población' => 'poblacion'
        ]
    );

    SimpleRoutes(
        'biometricos',
        'biometrics',
    	'',
        'terminals',
        'biometrics.terminals',
        'Terminales',
        'terminal_id',
        'una Terminal',
        [
            'terminal_id' => 'required | integer | min:0',
            'teminal_no' => 'required | integer | min:0',
            'terminal_status' => 'required | integer | min:0',
            'terminal_name' => 'required | string',
            'terminal_location' => 'required | string',
            'termnal_conecttype' => 'required | integer | min:0',
            'terminal_conectpwd' => 'required | string',
            'terminal_domainname' => 'required | string',
            'terminal_tcpip' => 'required | string',
            'terminal_port' => 'required | integer | min:0',
            'terminal_serial' => 'required | string',
            'terminal_baudrate' => 'required | integer | min:0',
            'terminal_type' => 'required | string',
            'terminal_users' => 'required | integer | min:0',
            'terminal_fingerprints' => 'required | integer | min:0',
            'terminal_punches' => 'required | integer | min:0',
            'terminal_faces' => 'required | integer | min:0',
            'terminal_zem' => 'required | string',
            'terminal_kind' => 'required | integer | min:0',
            'IsSelect' => 'required | integer | min:0',
            'terminal_timechk' => 'required | integer | min:0',
            'terminal_lastchk' => 'required | date | date_format:Y-m-d H:i:s',
        ],
        [
            'terminal_id'=> 'int',
            'teminal_no' => 'int',
            'termnal_conecttype' => 'int',
            'IsSelect'=> 'int'
        ]
    );
    
    SimpleRoutes(
        'excepciones',
        'biometrics',
        '',
        'exceptions',
        'biometrics.exceptions',
        'Excepciones',
        'id',
        'una excepcion',
        [
            'fecha_excep' => 'required | string | regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/',
            'tiempoini' => 'required | string | regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/',
            'tiempofin' => 'required | string | regex:/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/',
            'observacion' => 'required | string',
            'id_codpag' => 'required | integer | min:0 | exists:hr_codigos_pagos,id_codigo_pago',
            'id_trabajador' => 'required | integer | min:0 | exists:hr_empleados,id_empleado',
        ],
        [
            'id_codpag' => 'int',
            'id_trabajador' => 'int',
            'fecha_excep' => 'datetime',
            'tiempoini' => 'datetime',
            'tiempofin' => 'datetime'
        ]
    );

});

Route::middleware('needToken')->controller(systemController::class)->group(function () {
    Route::prefix('perfil')->group(function () {

        Route::get('', 'getviewAll')->name('raiz');   
        
        Route::get('{id}','editprofilef')->where('id', '[0-9]+')->name('rol.edit');

        Route::get('create','editrolf')->name('rol.submit');

        Route::post('', 'createrol')->name('create.rolss');
    
        Route::put('{id}', 'updatedprofilef')->where('id', '[0-9]+')->name('updatedprofilef.post');

        Route::delete('{id}','deleteR')->where('id', '[0-9]+')->name('deleteR.del');

    });
});