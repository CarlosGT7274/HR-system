<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function home(Request $request)
    {
        print_r($request->headers->get('authorization'));

        $response = $this->apiRequest('me', 'GET', []);

        $user = ['nombre' => 'Ejemplo', 'email' => 'ejemplo@correo.com'];

    $menuItems = [
        ['icon' => 'icon1', 'title' => 'Personal', 'subMenu' => ['Unidad', 'Departamentos', 'Puestos', 'Conceptos', 'Empleados', 'Aprobaciones', 'Vacaciones', 'Renuncias']],
        ['icon' => 'icon2', 'title' => 'Dispositivos', 'subMenu' => ['Dispositivos', 'Sincronizar Datos', 'Cargar eventos USB', 'Descargar eventos', 'Enrolamiento remoto']],
        ['icon' => 'icon3', 'title' => 'Asistencias', 'subMenu' => ['Asistencia', 'Incidencias', 'Excepciones', 'Tiempos Extras', 'Calendario', 'Horarios y Turnos', 'Consultas y Reportes']],
    ];

        return view('home.home', ['pageTitle' => 'Home', 'user' => $response['data'], 'menuItems' => $menuItems, 'attendance' => 0]);
    }


    public function graph(Request $request)
    {
        $response = $this->apiRequest('me', 'GET', []);

        $user = ['nombre' => 'Ejemplo', 'email' => 'ejemplo@correo.com'];

        $menuItems = [
            ['icon' => 'icon1', 'title' => 'Personal', 'subMenu' => ['Unidad', 'Departamentos', 'Puestos', 'Conceptos', 'Empleados', 'Aprobaciones', 'Vacaciones', 'Renuncias']],
            ['icon' => 'icon2', 'title' => 'Dispositivos', 'subMenu' => ['Dispositivos', 'Sincronizar Datos', 'Cargar eventos USB', 'Descargar eventos', 'Enrolamiento remoto']],
            ['icon' => 'icon3', 'title' => 'Asistencias', 'subMenu' => ['Asistencia', 'Incidencias', 'Excepciones', 'Tiempos Extras', 'Calendario', 'Horarios y Turnos', 'Consultas y Reportes']],
        ];

        // $request->validate([
        //     'date' => 'required'
        // ]);

        // $attendance = $this->apiRequest('dashboard/attendance', 'GET', [
        //     'date' => $request->date
        // ]);

        $attendance = $this->internalRequest('dashboard/attendance', 'post',  [ 'date'=>'2023-10-11' ]);

        return view('home.home', ['pageTitle' => 'Home', 'user' => $response['data'], 'menuItems' => $menuItems, 'attendance' => $attendance]);
    }

}