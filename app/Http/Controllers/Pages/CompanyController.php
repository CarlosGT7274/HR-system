<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $menuItems = [
        ['title' => 'Personal', 'subMenu' => ['Unidad', 'Departamentos', 'Puestos', 'Conceptos', 'Empleados', 'Aprobaciones', 'Vacaciones', 'Renuncias']],
        ['title' => 'Dispositivos', 'subMenu' => ['Dispositivos', 'Sincronizar Datos', 'Cargar eventos USB', 'Descargar eventos', 'Enrolamiento remoto']],
        ['title' => 'Asistencias', 'subMenu' => ['Asistencia', 'Incidencias', 'Excepciones', 'Tiempos Extras', 'Calendario', 'Horarios y Turnos', 'Consultas y Reportes']],
        ['title' => 'Sistema', 'subMenu' => ['Perfiles', 'Usuarios', 'Bitacora', 'Configurar correo']]
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private $uri, private $pageTitle)
    {
    }

    public function getAll($view)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $this->uri, 'GET', [])['data']
        ];

        return view($view, $data);
    }

    public function getOne($id, $view)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $id, 'GET', [])
        ];

        return view($view, $data);
    }

    public function form($view)
    {
        $data = [
            'pageTitle' => $this->pageTitle
        ];

        return view($view, $data);
    }

    public function create($route, Request $request, $validationRules, $changes = [])
    {
        $request->validate($validationRules);

        $data = [];

        foreach ($request->request as $key => $valor) {
            if (array_key_exists($key, $changes)) {
                $data[$changes[$key]] = $valor;
            } else {
                $data[$key] = $valor;
            }
        }

        print_r($data);

        $this->apiRequest('companies/' . session('company') . '/' . $this->uri, 'POST', $data);

        return redirect()->route($route);
    }

    public function delete($id, $route)
    {
        $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $id, 'DELETE', []);

        return redirect()->route($route);
    }

    public function update($route, Request $request, $validationRules, $changes = [])
    {
        $request->validate($validationRules);

        $data = [];

        foreach ($request->request as $key => $valor) {
            if (array_key_exists($key, $changes)) {
                $data[$changes[$key]] = $valor;
            } else {
                $data[$key] = $valor;
            }
        }

        print_r($data);

        $this->apiRequest('companies/' . session('company') . '/' . $this->uri, 'PUT', $data);

        return redirect()->route($route);
    }
}