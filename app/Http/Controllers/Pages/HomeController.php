<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $menuItems = [
        ['icon' => 'icon1', 'title' => 'Personal', 'subMenu' => ['Unidad', 'Departamentos', 'Puestos', 'Conceptos', 'Empleados', 'Aprobaciones', 'Vacaciones', 'Renuncias']],
        ['icon' => 'icon2', 'title' => 'Dispositivos', 'subMenu' => ['Dispositivos', 'Sincronizar Datos', 'Cargar eventos USB', 'Descargar eventos', 'Enrolamiento remoto']],
        ['icon' => 'icon3', 'title' => 'Asistencias', 'subMenu' => ['Asistencia', 'Incidencias', 'Excepciones', 'Tiempos Extras', 'Calendario', 'Horarios y Turnos', 'Consultas y Reportes']],
    ];
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
        return view('home.home', ['pageTitle' => 'Home', 'menuItems' => $this->menuItems, 'attendance' => []]);
    }


    public function graph(Request $request)
    {
        $request->validate([
            'fecha' => 'required | date | date_format:Y-m-d'
        ]);

        $attendance = $this->apiRequest('dashboard/attendance', 'GET', [
            'date' => $request->fecha
        ]);

        // $attendance = $this->internalRequest('dashboard/attendance', 'GET',  ['date' => '2023-10-11']);

        // return $attendance;

        return view('home.home', ['pageTitle' => 'Home', 'menuItems' => $this->menuItems, 'attendance' => $attendance]);
    }
}
