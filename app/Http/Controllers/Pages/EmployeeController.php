<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    private $base_route = "employees.general";
    private $page_title = "Empleados";
    private $id_name = "empleado";

    private $HR_validationRules = [
        'id_usuario' => 'required | integer | min:1 | exists:sys_usuarios,id_usuario',
        'teléfono' => 'required | string | regex:/^\d{10}$/',
        'teléfono_respaldo' => 'nullable | sometimes | string | regex:/^\d{10}$/',
        'email_respaldo' => 'nullable | sometimes | email',
        'rfc' => 'required | string | size:13',
        'curp' => 'required | string | size:18',
        'sexo' => 'required | integer | between:0,1',
        'estado_civil' => 'required | integer | min:1 | max:6',
        'cumpleaños' => 'required | date | date_format:Y-m-d',
        'lugar_natal' => 'required | integer | between:1,32',
        'calle' => 'required | string | max:40',
        'colonia' => 'required | string | max:40',
        'población' => 'required | string | max:40',
        'ciudad' => 'required | string | max:40',
        'estado' => 'required | integer | between:1,32',
        'código_postal' => 'required | string | size:5',
        'nombreEmergencia' => 'required | string | max:80',
        'dirEmergencia' => 'required | string | max:150',
        'telEmergencia' => 'required | string | regex:/^\d{10}$/',
        'imss' => 'required | string | size:11',
        'tipo_de_sangre' => 'required | string | max:3',
        'enfermedades' => 'nullable | sometimes | string | max:300',
        'fonacot' => 'nullable | sometimes | string | max:15',
        'unidadMedica' => 'required | integer | min:1',
        'altaFiscal' => 'required | date | date_format:Y-m-d',
        'contratoInicio' => 'required | date | date_format:Y-m-d',
        'contratoFin' => 'required | date | date_format:Y-m-d',
        'sueldo' => 'required | decimal:0,6 | min:0',
        'formaPago' => 'required | string | size:1',
        'pensAlimenticia' => 'required | integer | between:0,1',
        'clave_de_nómina' => 'nullable | sometimes | string | max:10',
        'banco_de_nómina' => 'nullable | sometimes | integer | min:0',
        'localidad_de_nómina' => 'nullable | sometimes | string | max:20',
        'referencia_de_nómina' => 'nullable | sometimes | string | max:16',
        'cuenta_de_nómina' => 'nullable | sometimes | string | max:16',
        'id_unidad' => 'required | integer | min:1 | exists:hr_unidades,id_unidad',
        'id_departamento' => 'required | integer | min:1 | exists:hr_departamentos,id_departamento',
        'id_puesto' => 'required | integer | min:1 | exists:hr_puestos,id_puesto',
        'id_tipo_empleado' => 'required | integer | min:1 | exists:hr_tipos_empleados,id_tipo_empleado',
        'id_horario' => 'required | integer | min:1 | exists:hr_horarios,id_horario',
        'id_empresa' => 'required | integer | min:1 | exists:hr_empresas,id_empresa',
        'id_terminal_user' => 'required | integer | min:1 | exists:att_empleado,emp_id',
    ];
    private $HR_changes = [
        'lugar_natal' => 'lugarNatal',
        'estado_civil' => 'estadoCivil',
        'teléfono' => 'telefono',
        'teléfono_respaldo' => 'telefono2',
        'email_respaldo' => 'email2',
        'población' => 'poblacion',
        'código_postal' => 'codigoPostal',
        'tipo_de_sangre' => 'tipoSangre',

        'clave_de_nómina' => 'nomClave',
        'banco_de_nómina' => 'nomBanco',
        'localidad_de_nómina' => 'nomLocalidad',
        'referencia_de_nómina' => 'nomReferencia',
        'cuenta_de_nómina' => 'nomCuenta',

        'fecha_de_alta' => 'alta',
        'fecha_de_alta_fiscal' => 'altaFiscal',
        'fecha_de_inicio_de_contrato' => 'contratoInicio',
        'fecha_de_fin_del_contrato' => 'contratoFin',
        'forma_de_pago' => 'formaPago',
        'incluye_pensión_alimenticia' => 'pensAlimenticia',

        'unidad' => 'id_unidad',
        'departamento' => 'id_departamento',
        'puesto' => 'id_puesto',
        'tipo_de_empleado' => 'id_tipo_empleado',
        'horario' => 'id_horario',

        'id_usuario' => 'int',
        'sexo' => 'int',
        'estadoCivil' => 'int',
        'lugarNatal' => 'int',
        'estado' => 'int',
        'unidadMedica' => 'int',
        'pensAlimenticia' => 'int',
        'nomBanco' => 'int',
        'id_unidad' => 'int',
        'id_departamento' => 'int',
        'id_puesto' => 'int',
        'id_tipo_empleado' => 'int',
        'id_horario' => 'int',
        'id_empresa' => 'int',
        'id_terminal_user' => 'int',
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getAll()
    {
        $employees = $this->apiRequest('companies/' . session('company') . '/employees', 'GET', [])['data'];


        $data = [
            'pageTitle' => $this->page_title,
            'base_route' => $this->base_route,
            'id_name' => $this->id_name,
            'data' => $employees,
            'nombre' => ''
        ];
        // return $data;
        return view($this->base_route . '.all', $data);
    }

    public function getOne($id)
    {
        $companyInfo = [];
        $companyInfo['unidades'] = $this->apiRequest('companies/' . session('company') . '/units', 'GET', [])['data'];
        $companyInfo['departamentos'] = $this->apiRequest('companies/' . session('company') . '/departments', 'GET', [])['data'];
        $companyInfo['puestos'] = $this->apiRequest('companies/' . session('company') . '/positions', 'GET', [])['data'];
        $companyInfo['tipos_empleados'] = $this->apiRequest('companies/' . session('company') . '/employeeTypes', 'GET', [])['data'];
        $companyInfo['horarios'] = $this->apiRequest('companies/' . session('company') . '/schedules', 'GET', [])['data'];

        $employees = $this->apiRequest('employees/' . $id, 'GET', [])['data'];

        $data = [
            'pageTitle' => $this->page_title,
            'base_route' => $this->base_route,
            'id_name' => $this->id_name,
            'employee' => $employees,
            'companyInfo' => $companyInfo,
            'father_url' => '',
            'father_id' => ''
        ];

        return view($this->base_route . '.one', $data);
    }

    public function update_HR($id, Request $request)
    {
        $request->validate($this->HR_validationRules);

        $data = $this->UpdateRequest($request, $this->HR_changes);

        $this->apiRequest('employees/' . $id, 'PUT', $data);

        return redirect()->route($this->base_route . '.one', ['id' => $id]);
    }
}
