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
        // dd($data);
        return view($view, $data);
    }

    public function updatedprofilef(Request $request)
    {
        // dd($request->all());
        // echo json_encode($request->all(), JSON_PRETTY_PRINT);

        $result = [
            "nombre" => $request["Nrol"],
            "permisos" => [],
        ];
        
        foreach ($request["permisos"] as $permiso) {
            $permiso_value = -1; // Valor predeterminado a -1
            $id_permiso = $permiso["id_permiso"];

            if (in_array(15, $permiso)) {
                $permiso_value = 15;
            } elseif (in_array(-1, $permiso)) {
                $permiso_value = -1;
            } else {
                unset($permiso["id_permiso"]); // Opcional si no necesitas id_permiso
                $numeric_values = array_filter($permiso, 'is_numeric');
        
                if (!empty($numeric_values)) {
                    $permiso_value = array_sum($numeric_values);
                }
            }
        
            $result["permisos"][] = [
                "id_permiso" => (int) $id_permiso, 
                "permiso" => $permiso_value,
            ];
        }
        
            // dd($numeric_values);
        // dd($result);
       
        $this->apiRequest('rols' . '/' . $request['idrol'], "PUT", [
            "nombre" => $request["Nrol"],
            "permisos" => [
                [
                    "id_permiso" => 0,
                    "permiso" => 0,
                ]
            ],
        ]);

     

        $update = $this->apiRequest('rols' . '/' . $request['idrol'],'PUT', $result);
   

        
      
        return view('system.roles.admincrud', [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
            'update' => $update
        ]);
    }

    public function editrolf($view)
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
        ];
        // dd($data);

        return view($view, $data);
    }

    public function createrol(Request $request)
    {
        dd($request->all());
    }
}

?>
