<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class systemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(private $uri, private $titlepage)
    {
    }

    public function getviewAll($view)
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
        ];

        return view($view, $data);
    }

    public function editprofilef($view, $id)
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols' . '/' . $id, 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
        ];

        return view($view, $data);
    }

    public function updatedprofilef(Request $request)
    {
        // dd($request->all());
        $new_permisos = [];

        foreach ($request['permisos'] as $permiso) {
            $suma_permiso = 0;
            foreach ($permiso as $valor) {
                if (in_array($valor, ['15', '-1'])) {
                    $suma_permiso = intval($valor);
                    break;
                }
                $suma_permiso += intval($valor);
            }
            $new_permisos[] = [
                'id_permiso' => $permiso['id_permiso'],
                'permiso' => $suma_permiso,
            ];
        }

        $dataparupdate = [];
        $dataparupdate = ['nombre' => $request['Nrol'], 'permisos' => $new_permisos];
        // echo json_encode($dataparupdate, JSON_PRETTY_PRINT);
        $update = $this->apiRequest('rols' . '/' . $request['idrol'],'PUT', $dataparupdate);
        dd($update);
        // return view('system.roles.admincrud', [
        //     'pageTitle' => $this->titlepage,
        //     'data' => $this->apiRequest('rols', 'GET', [])['data'],
        //     'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
        //     'update' => $update
        // ]);
    }

    public function editrolf($view)
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
        ];

        return view($view, $data);
    }
}

?>
