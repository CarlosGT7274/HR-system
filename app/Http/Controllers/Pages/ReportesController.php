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

    public function homeAsistencias(){
        // echo Carbon::now()->subMonth()->format('Y-m-d');

        $data = [
            'pageTitle' => $this->pageTitle,
            'data'=> $this->apiRequest(  'companies/' . session('company') . '/reportAttendance', 'GET', [
                'inicio' => Carbon::now()->subWeek()->format('Y-m-d'),
                'fin' => Carbon::now()->format('Y-m-d')
            ])['data'],
        ];

        return view("Reportes.all", $data);
    }

}
?>