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

        $unidades = $this->apiRequest('companies/' . session('company') . '/units', 'get', []);
        $departamentos = $this->apiRequest('companies/' . session('company') . '/departments', 'get', []);

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
            "rotations" => $rotations1,
            "unidades" => $unidades['data'],
            "departamentos" => $departamentos['data']
        ]);
    }


    public function graph(Request $request)
    {
        $request->validate([
            'fecha' => 'required | date | date_format:Y-m-d',
            'unidad' => 'integer',
            "posiciones" => 'integer',
            'departamento' => 'integer'
        ]);

        $apiParams = [];

        foreach($request->all() as $key => $param){
            if($param != null){
                $newKey = '';

                switch ($key) {
                    case 'fecha':
                        $newKey = 'date';
                        break;
                    case 'unidad':
                        $newKey = 'unit';
                        break;
                    case 'departamento':
                        $newKey = 'department';
                        break;
                    case 'posiciones':
                        $newKey = 'position';
                        break;
                }

                
                $apiParams[$newKey] = $param;
            }
        }

        // dd($request['unidad']);
        dd($apiParams);

        $unidades = $this->apiRequest('companies/' . session('company') . '/units', 'get', []);
        $departamentos = $this->apiRequest('companies/' . session('company') . '/departments', 'get', []);
        $posciones = $this->apiRequest('companies/' . session('company') . '/positions', 'get', []);
        // dd($posciones);
        $general = $this->apiRequest('dashboard/general', 'get', $apiParams);
        
        $salaries = $this->apiRequest("dashboard/salaries", "get", $apiParams);
        
        $birthdays = $this->apiRequest("dashboard/birthdays", "get", $apiParams);
        
        // dd($birthdays);
        
        $rotations = $this->apiRequest("dashboard/rotations", "get", $apiParams);
        
        $apiParams['paramDate'] = $request->fecha;

        $attendance = $this->apiRequest('dashboard/attendance', 'get', $apiParams);

        // dd($attendance);
        
        return view('home.home', [
            'pageTitle' => 'Home', 
            'menuItems' => $this->menuItems, 
            'attendance' => $attendance, 
            'general' => $general, 
            "salaries" => $salaries, 
            "birthdays" => $birthdays,
            "rotations" => $rotations,
            "unidades" => $unidades['data'],
            "departamentos" => $departamentos['data'],
            "posiciones" => $posciones['data']
        ]);
    }
}
