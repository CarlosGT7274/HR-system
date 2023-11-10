<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    private $base_route = "employees.general";
    private $page_title = "Empleados";
    private $id_name = "empleado";
    private $permisos = null;

    private $SYS_validationRules = [
        'correo' => 'required | string | email',
        'contraseña' => 'required | string',
        'nombre' => 'required | string',
        'apellido_paterno' => 'required | string',
        'apellido_materno' => 'required | string',
        'rol' => 'required | integer | min:1 | exists:sys_roles,id_rol',
        'empresa' => 'integer | min:1 | exists:hr_empresas,id_empresa | exclude_if:rol,1'
    ];
    private $SYS_changes = [
        'correo' => 'email',
        'contraseña' => 'password',
        'apellido_paterno' => 'apellidoP',
        'apellido_materno' => 'apellidoM',
        'rol' => 'id_rol',
        'empresa' => 'id_empresa'
    ];

    private $ATT_validationRules = [
        'emp_pin' => 'required | integer | min:0',
        'emp_code' => 'required | string',
        'emp_role' => 'required | string',
        'emp_firstname' => 'required | string',
        'emp_lastname' => 'required | string',
        'emp_username' => 'required | string',
        'emp_pwd' => 'required | string',
        'emp_privilege' => 'required | string',
        'emp_group' => 'required | string',
        'emp_active' => 'required | integer | min:0',
        'emp_cardNumber' => 'required | string',
        'IsSelect' => 'required | integer | min:0',
    ];
    private $ATT_changes = [
        'emp_pin' => 'int',
        'emp_active' => 'int',
        'IsSelect' => 'int',
    ];

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
        'nombre_de_contacto_de_emergencia' => 'required | string | max:80',
        'dirección_del_contacto_de_emergencia' => 'required | string | max:150',
        'teléfono_del_contacto_de_emergencia' => 'required | string | regex:/^\d{10}$/',
        'imss' => 'required | string | size:11',
        'tipo_de_sangre' => 'required | string | max:3',
        'enfermedades' => 'nullable | sometimes | string | max:300',
        'fonacot' => 'nullable | sometimes | string | max:15',
        'unidad_médica' => 'required | integer | min:1',
        'fecha_de_alta' => 'required | date | date_format:Y-m-d',
        'fecha_de_alta_fiscal' => 'required | date | date_format:Y-m-d',
        'fecha_de_inicio_de_contrato' => 'required | date | date_format:Y-m-d',
        'fecha_de_fin_del_contrato' => 'required | date | date_format:Y-m-d',
        'sueldo' => 'required | decimal:0,6 | min:0',
        'forma_de_pago' => 'required | string | size:1',
        'incluye_pensión_alimenticia' => 'required | integer | between:0,1',
        'clave_de_nómina' => 'nullable | sometimes | string | max:10',
        'banco_de_nómina' => 'nullable | sometimes | integer | min:0',
        'localidad_de_nómina' => 'nullable | sometimes | string | max:20',
        'referencia_de_nómina' => 'nullable | sometimes | string | max:16',
        'cuenta_de_nómina' => 'nullable | sometimes | string | max:16',
        'unidad' => 'required | integer | min:1 | exists:hr_unidades,id_unidad',
        'departamento' => 'required | integer | min:1 | exists:hr_departamentos,id_departamento',
        'puesto' => 'required | integer | min:1 | exists:hr_puestos,id_puesto',
        'tipo_de_empleado' => 'required | integer | min:1 | exists:hr_tipos_empleados,id_tipo_empleado',
        'horario' => 'required | integer | min:1 | exists:hr_horarios,id_horario',
        'id_empresa' => 'required | integer | min:1 | exists:hr_empresas,id_empresa',
        'id_terminal_user' => 'required | integer | min:1 | exists:att_empleado,emp_id',
    ];
    private $HR_changes = [
        'unidad_médica' => 'unidadMedica',
        'nombre_de_contacto_de_emergencia' => 'nombreEmergencia',
        'dirección_del_contacto_de_emergencia' => 'dirEmergencia',
        'teléfono_del_contacto_de_emergencia' => 'telEmergencia',

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
        if ($this->permisos === null) {
            $this->permisos = session('permissions')[2]['sub_permissions'][205];
        }

        $employees = $this->apiRequest('companies/' . session('company') . '/employees', 'GET', [])['data'];

        $data = [
            'pageTitle' => $this->page_title,
            'base_route' => $this->base_route,
            'id_name' => $this->id_name,
            'data' => $employees,
            'nombre' => '',
            'permiso' => $this->permisos['valor']
        ];

        return view($this->base_route . '.all', $data);
    }

    public function getOne($id)
    {
        if ($this->permisos === null) {
            $this->permisos = session('permissions')[2]['sub_permissions'][205];
        }

        $roles = $this->apiRequest('rols', 'GET', [])['data'];
        $companyInfo = [];
        $companyInfo['unidades'] = $this->apiRequest('companies/' . session('company') . '/units', 'GET', [])['data'];
        $companyInfo['departamentos'] = $this->apiRequest('companies/' . session('company') . '/departments', 'GET', [])['data'];
        $companyInfo['puestos'] = $this->apiRequest('companies/' . session('company') . '/positions', 'GET', [])['data'];
        $companyInfo['tipos_empleados'] = $this->apiRequest('companies/' . session('company') . '/employeeTypes', 'GET', [])['data'];
        $companyInfo['horarios'] = $this->apiRequest('companies/' . session('company') . '/schedules', 'GET', [])['data'];

        $employee = $this->apiRequest('employees/' . $id, 'GET', [])['data'];
        $user = $this->apiRequest('users/' . $employee['id_usuario'], 'GET', [])['data'];
        $terminal_user = $this->apiRequest('biometrics/employees/' . $employee['id_terminal_user'], 'GET', [])['data'];

        $data = [
            'pageTitle' => $this->page_title,
            'base_route' => $this->base_route,
            'id_name' => $this->id_name,
            'user' => $user,
            'roles' => $roles,
            'employee' => $employee,
            'companyInfo' => $companyInfo,
            'terminal_user' => $terminal_user,
            'father_url' => '',
            'father_id' => '',
            'permisos' => $this->permisos
        ];

        return view($this->base_route . '.one', $data);
    }

    public function create()
    {
    }

    public function update_SYS($id, Request $request)
    {
        if ($this->permisos === null) {
            $this->permisos = session('permissions')[2]['sub_permissions'][205];
        }

        $request->validate([
            'correo' => 'required | string | email',
            'nombre' => 'required | string',
            'apellido_paterno' => 'required | string',
            'apellido_materno' => 'required | string',
            'rol' => 'required | integer | min:1 | exists:sys_roles,id_rol',
        ]);

        $data = $this->UpdateRequest($request, $this->SYS_changes);

        $this->apiRequest('users/' . $id, 'PUT', $data);

        return redirect()->route($this->base_route . '.one', ['id' => $id]);
    }

    public function update_HR($id, Request $request)
    {
        if ($this->permisos === null) {
            $this->permisos = session('permissions')[2]['sub_permissions'][205];
        }

        $request->validate($this->HR_validationRules);

        $data = $this->UpdateRequest($request, $this->HR_changes);

        $this->apiRequest('employees/' . $id, 'PUT', $data);

        return redirect()->route($this->base_route . '.one', ['id' => $id]);
    }

    public function update_ATT($id, Request $request)
    {
        if ($this->permisos === null) {
            $this->permisos = session('permissions')[2]['sub_permissions'][205];
        }

        $request->validate($this->ATT_validationRules);

        $data = $this->UpdateRequest($request, $this->ATT_changes);

        $this->apiRequest('biometrics/employees/' . $id, 'PUT', $data);

        return redirect()->route($this->base_route . '.one', ['id' => $id]);
    }

    public function delete($id)
    {
    }
}
