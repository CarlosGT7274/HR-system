<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    private $menuItems = [
        ['title' => 'Personal', 'subMenu' => ['Unidad', 'Departamentos', 'Puestos', 'Conceptos', 'Empleados', 'Aprobaciones', 'Vacaciones', 'Renuncias']],
        ['title' => 'Dispositivos', 'subMenu' => ['Dispositivos', 'Sincronizar Datos', 'Cargar eventos USB', 'Descargar eventos', 'Enrolamiento remoto']],
        ['title' => 'Asistencias', 'subMenu' => ['Asistencia', 'Incidencias', 'Excepciones', 'Tiempos Extras', 'Calendario', 'Horarios y Turnos', 'Consultas y Reportes']],
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

        $fechaActual = Carbon::now()->format('Y-m-d');

        $attendance = $this->apiRequest('dashboard/attendance', 'GET', [
            'date' => $fechaActual
        ]);

        $general1 = $this->apiRequest('dashboard/general', 'get', [
            'date' => $fechaActual
        ]);

        $salaries1 = $this->apiRequest("dashboard/salaries", "get", [
            "date" => $fechaActual
        ]);

        $birthdays1 = $this->apiRequest("dashboard/birthdays", "get", [
            'date' => $fechaActual
        ]);

        $rotations1 = $this->apiRequest("dashboard/rotations", "get", [
            'date' => $fechaActual
        ]);

        return view('home.home', [
            'pageTitle' => 'Home', 
            'menuItems' => $this->menuItems, 
            'attendance' => $attendance, 
            "general" => $general1, 
            "salaries" => $salaries1, 
            "birthdays" => $birthdays1,
            "rotations" => $rotations1
        ]);
    }


    public function graph(Request $request)
    {
        $request->validate([
            'fecha' => 'required | date | date_format:Y-m-d'
        ]);

        $attendance = $this->apiRequest('dashboard/attendance', 'get', [
            'date' => $request->fecha
        ]);

        // var_dump(json_encode($attendance));

        $general = $this->apiRequest('dashboard/general', 'get', [
            'date' => $request->fecha
        ]);

        $salaries = $this->apiRequest("dashboard/salaries", "get", [
            "date" => $request->fecha
        ]);

        $birthdays = $this->apiRequest("dashboard/birthdays", "get", [
            'date' => $request->fecha
        ]);

        $rotations = $this->apiRequest("dashboard/rotations", "get", [
            'date' => $request->fecha
        ]);

        return view('home.home', [
            'pageTitle' => 'Home', 
            'menuItems' => $this->menuItems, 
            'attendance' => $attendance, 
            'general' => $general, 
            "salaries" => $salaries, 
            "birthdays" => $birthdays,
            "rotations" => $rotations
        ]);
    }
}
