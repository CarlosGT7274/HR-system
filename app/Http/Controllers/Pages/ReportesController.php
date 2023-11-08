<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

use Barryvdh\DomPDF\Facade\PDF;
use dompdf\Dompdf;
use Dompdf\Options;

class ReportesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $pageTitle = "";

    public function __construct()
    {
    }

    public function homeAsistencias(Request $request)
    {
        // dd($request);
        if ($request->method() === 'POST') {
            //do notingh
            $request->validate([
                'inicio' => 'required',
                'fin' => 'required'
            ]);
        }
        // dd($request->all());
        // echo Carbon::now()->subMonth()->format('Y-m-d');
        if ($request->has('inicio') && $request->has('fin')) {
            if (empty($request->input('inicio')) && empty($request->input('fin'))) {
                $fin = Carbon::now()->format('Y-m-d');
                $inicio = Carbon::now()->subWeek()->format('Y-m-d');
                // dd('c');    
            } else {
                $fin = $request->input('fin');
                $inicio = $request->input('inicio');
                // dd('a');
            }
        } else {
            // dd('b');
            $fin = Carbon::now()->format('Y-m-d');
            $inicio = Carbon::now()->subWeek()->format('Y-m-d');
        }

        $data = [
            'inicio' => $inicio,
            'fin' => $fin,
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/reportAttendance', 'GET', [
                'inicio' => $inicio,
                'fin' => $fin
            ])['data'],
        ];

        return view("Reportes.all", $data);
    }

    public function aboutIncidencias(Request $request)
    {
        if ($request->has('inicio') && $request->has('fin')) {
            if (empty($request->input('inicio')) && empty($request->input('fin'))) {
                $fin = Carbon::now()->format('Y-m-d');
                $inicio = Carbon::now()->subWeek()->format('Y-m-d');
                // dd('c');    
            } else {
                $fin = $request->input('fin');
                $inicio = $request->input('inicio');
                // dd('a');
            }
        } else {
            // dd('b');
            $fin = Carbon::now()->format('Y-m-d');
            $inicio = Carbon::now()->subWeek()->format('Y-m-d');
        }

        $data = [
            'inicio' => $inicio,
            'fin' => $fin,
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/reportIncidencies', 'GET', [
                'inicio' => $inicio,
                'fin' => $fin
            ])['data'],
        ];
        return view('Reportes.incidencias', $data);
    }

    // public function fechaReporte(){

    // }


    // public function generarPDF()
    // {
    //     // dd(Carbon::now()->subWeek()->format('Y-m-d'));

    //     $data = [
    //         'titulo' => 'Ejemplo de PDF en Laravel',
    //         'pageTitle' => $this->pageTitle,
    //         'data'=> $this->apiRequest(  'companies/' . session('company') . '/reportAttendance', 'GET', [
    //             'inicio' => Carbon::now()->subWeek()->format('Y-m-d'),
    //             'fin' => Carbon::now()->format('Y-m-d')
    //         ])['data'],
    //     ];


    //     $pdf = PDF::loadView('Reportes.asistenciaview', $data)->setPaper('a4', 'landscape');


    //     return  $pdf->download('Reporteasistencias.pdf');


    // }
    public function generarPDF(Request $request)
    {
        $viewName = $request->input('viewName');
        $inicio = $request->input('inicio');
        $fin = $request->input('fin');
        $endpointApi = $request->input('endpointApi');

        if ($inicio === null) {
            $inicio = Carbon::now()->subWeek()->format('Y-m-d');
        }

        if ($fin === null) {
            $fin = Carbon::now()->format('Y-m-d');
        }

        $data = [
            'titulo' => 'Ejemplo de PDF en Laravel',
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $endpointApi, 'GET', [
                'inicio' => $inicio,
                'fin' => $fin,
            ])['data'],
        ];

        $pdf = PDF::loadView($viewName, $data)->setPaper('a4', 'landscape');

        return $pdf->download('Reporte.pdf');
    }


}