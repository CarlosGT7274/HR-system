<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private $uri_prefix, private $extraId, private $uri_suffix, private $pageTitle, private $baseUrl, private $id_name)
    {
    }

    public function UpdateRequest(Request $request, $changes)
    {
        $data = [];

        foreach ($request->request as $llave => $valor) {
            if (is_array($valor)) {
                foreach ($valor as $key => $value) {
                    $data[$llave][$key] = $value;

                    foreach ($value as $sub_key => $sub_value) {
                        if (array_key_exists($sub_key, $changes)) {
                            if ($changes[$sub_key] == 'int') {
                                $data[$llave][$key][$sub_key] = (int) $sub_value;
                            } 
                            else if ($changes[$sub_key] == 'datetime') {
                                $data[$llave][$key][$sub_key] = str_replace('T', ' ', $sub_value);
                            }
                            else {
                                $data[$llave][$key][$changes[$sub_key]] = $sub_value;
                                unset($data[$llave][$key][$sub_key]);
                            }
                        }
                    }
                }
            } else {
                if (array_key_exists($llave, $changes)) {
                    if ($changes[$llave] == 'int') {
                        $data[$llave] = (int) $valor;
                    } 
                    else if ($changes[$llave] == 'datetime') {
                        $data[$llave] = str_replace('T', ' ', $valor);
                    } else {
                        $data[$changes[$llave]] = $valor;
                    }
                    unset($changes[$llave]);
                } else {
                    $data[$llave] = $valor;
                }
            }
        }

        if (!empty($changes)) {
            foreach ($data as $llave => $valor) {

                if (is_array($valor)) {
                    foreach ($valor as $key => $value) {
                        foreach ($value as $sub_key => $sub_value) {
                            if (array_key_exists($sub_key, $changes)) {
                                if ($changes[$sub_key] == 'int') {
                                    $data[$llave][$key][$sub_key] = (int) $sub_value;
                                } 
                                else if ($changes[$sub_key] == 'datetime') {
                                    $data[$llave][$key][$sub_key] = str_replace('T', ' ', $sub_value);
                                }
                            }
                        }
                    }
                }
                else {
                    if (array_key_exists($llave, $changes)) {
                        if ($changes[$llave] == 'int') {
                            $data[$llave] = (int) $valor;
                        } 
                        else if ($changes[$llave] == 'datetime') {
                            $data[$llave] = str_replace('T', ' ', $valor);
                        }
                    }
                }
            }
        }
        return $data;
    }

    public function getEndpoint()
    {
        $endpoint = $this->uri_prefix;

        switch ($this->extraId) {
            case 'company':
                $endpoint .= '/' . session('company');
                break;

            default:
                # code...
                break;
        }

        if ($this->uri_suffix != '') {
            $endpoint .= '/' . $this->uri_suffix;
        }
        return $endpoint;
    }

    public function getAll()
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest($this->getEndpoint(), 'GET', [])['data'],
            'nombre' => '',
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($this->baseUrl . '.all', $data);
    }

    public function getOne($id, $failed = false)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest($this->getEndpoint() . '/' . $id, 'GET', [])['data'],
            'failed' => $failed,
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($this->baseUrl . '.one', $data);
    }

    public function search(Request $request)
    {
        $request->validate([
            'nombre' => 'required | string',
        ]);

        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest($this->getEndpoint() . '/' . $request->nombre, 'GET', [])['data'],
            'nombre' => $request->nombre,
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($this->baseUrl . '.all', $data);
    }

    public function form($title, $employeesForForm)
    {
        // dd($employeesForForm);

        $data = [
            'pageTitle' => $this->pageTitle,
            'title' => $title,
            'base_route' => $this->baseUrl,
            'empleados' => $employeesForForm ? $this->apiRequest($this->uri_prefix . '/' . session('company') . '/employees', 'GET', [])['data'] : [],
        ];

        return view($this->baseUrl . '.form', $data);
    }

    public function create(Request $request, $validationRules, $changes = [])
    {
        $request->validate($validationRules);
        // dd($request);

        $data = $this->UpdateRequest($request, $changes);
        // dd($data);
        // dd($this->apiRequest($this->getEndpoint(), 'POST', $data));
        $this->apiRequest($this->getEndpoint(), 'POST', $data);
        return redirect()->route($this->baseUrl . '.all');
    }

    public function delete($id)
    {
        $response = $this->apiRequest($this->getEndpoint() . '/' . $id, 'DELETE', []);

        if ($response['error']) {
            return $this->getOne($id, true);
        } else {
            return redirect()->route($this->baseUrl . '.all');
        }
    }

    public function update($id, Request $request, $validationRules, $changes = [])
    {
        $request->validate($validationRules);

        $data = $this->UpdateRequest($request, $changes);
        
        $this->apiRequest($this->getEndpoint() . '/' . $id, 'PUT', $data);

        return redirect()->route($this->baseUrl . '.one', ['id' => $id]);
    }
}
