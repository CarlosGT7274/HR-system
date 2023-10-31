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

    private $titlepage = '';

    public function getviewAll()
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
        ];

        return view('system.roles.admincrud', $data);
    }

    public function editprofilef($id, $failed = '')
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols' . '/' . $id, 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
            'delete' => $failed,
        ];

        return view('system.roles.editP', $data);
    }

    public function updatedprofilef(Request $request, $id)
    {
        // $request->validate([
        //     'nombre' => 'sometimes | required | string'
        // ]);

        // dd($request->all());

        $result = [
            'nombre' => $request['Nrol'],
            'permisos' => [],
        ];

        foreach ($request['permisos'] as $permiso) {
            $permiso_value = -1; // Valor predeterminado a -1
            $id_permiso = $permiso['id_permiso'];

            if (in_array(15, $permiso)) {
                $permiso_value = 15;
            } elseif (in_array(-1, $permiso)) {
                $permiso_value = -1;
            } else {
                unset($permiso['id_permiso']); 
                // dd($permiso);
                $numeric_values = [];
               
                if (isset($permiso['todos'])) {
                    $permiso['todos'] = 15;
                    $numeric_values[] = $permiso['todos'];
                } else {
                    if (isset($permiso['off'])) {
                        $permiso['off'] = -1;
                        $numeric_values[] = $permiso['off'];
                    }
                
                    if (isset($permiso['on'])) {
                        $permiso['on'] = 0;
                        $numeric_values[] = $permiso['on'];
                    }
                
                    if (isset($permiso['r'])) {
                        $permiso['r'] = 1;
                        $numeric_values[] = $permiso['r'];
                    }
                
                    if (isset($permiso['c'])) {
                        $permiso['c'] = 2;
                        $numeric_values[] = $permiso['c'];
                    }
                
                    if (isset($permiso['u'])) {
                        $permiso['u'] = 4;
                        $numeric_values[] = $permiso['u'];
                    }
                
                    if (isset($permiso['d'])) {
                        $permiso['d'] = 8;
                        $numeric_values[] = $permiso['d'];
                    }
                }
                
                
                if (!empty($numeric_values)) {
                    $permiso_value = array_sum($numeric_values);
                }
                
            }

            $result['permisos'][] = [
                'id_permiso' => (int) $id_permiso,
                'permiso' => $permiso_value,
            ];
        }

        // dd($result);

        $this->apiRequest('rols' . '/' . $request['idrol'], 'PUT', $result);

        return redirect()->route('rol.edit', ['id' => $id]);
    }

    public function editrolf()
    {
        $data = [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
        ];
        // dd($data);

        return view('system.roles.roledit', $data);
    }

    public function createrol(Request $request)
    {
        // dd($request->all());

        $result = [
            'nombre' => $request['Nrol'],
            'permisos' => [],
        ];

        foreach ($request['permisos'] as $permiso) {
            $permiso_value = -1;
            $id_permiso = $permiso['id_permiso'];

            if (in_array(15, $permiso)) {
                $permiso_value = 15;
            } elseif (in_array(-1, $permiso)) {
                $permiso_value = -1;
            } else {
                unset($permiso['id_permiso']); 
                // dd($permiso);
                $numeric_values = [];
               
                if (isset($permiso['todos'])) {
                    $permiso['todos'] = 15;
                    $numeric_values[] = $permiso['todos'];
                } else {
                    if (isset($permiso['off'])) {
                        $permiso['off'] = -1;
                        $numeric_values[] = $permiso['off'];
                    }
                
                    if (isset($permiso['on'])) {
                        $permiso['on'] = 0;
                        $numeric_values[] = $permiso['on'];
                    }
                
                    if (isset($permiso['r'])) {
                        $permiso['r'] = 1;
                        $numeric_values[] = $permiso['r'];
                    }
                
                    if (isset($permiso['c'])) {
                        $permiso['c'] = 2;
                        $numeric_values[] = $permiso['c'];
                    }
                
                    if (isset($permiso['u'])) {
                        $permiso['u'] = 4;
                        $numeric_values[] = $permiso['u'];
                    }
                
                    if (isset($permiso['d'])) {
                        $permiso['d'] = 8;
                        $numeric_values[] = $permiso['d'];
                    }
                }
                
                
                if (!empty($numeric_values)) {
                    $permiso_value = array_sum($numeric_values);
                }
            }

            $result['permisos'][] = [
                'id_permiso' => (int) $id_permiso,
                'permiso' => $permiso_value,
            ];
        }

        $create = $this->apiRequest('rols' . '/', 'POST', $result);

        // dd($create);

        return view('system.roles.admincrud', [
            'pageTitle' => $this->titlepage,
            'data' => $this->apiRequest('rols', 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data'],
            'create' => $create,
            'delete' => '',
        ]);
    }

    public function deleteR($id)
    {
        $delete = $this->apiRequest('rols' . '/' . $id, 'DELETE', []);

        if ($delete['error'] == true) {
            return $this->editprofilef($id, $delete['mensaje']);
        } else {
            return redirect()->route('raiz');
        }
    }
}

?>
