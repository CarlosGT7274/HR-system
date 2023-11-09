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
    public function __construct(private $uri_prefix, private $extraId, private $uri_suffix, private $pageTitle, private $baseUrl, private $id_name, private $father_url = '')
    {
    }

    public function getEndpoint($father_id = '')
    {
        $endpoint = $this->uri_prefix;

        switch ($this->extraId) {
            case 'payCode':
                $endpoint .= '/' . session('company') . '/payCodes' . '/' . $father_id;
                break;
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
            'id_name' => $this->id_name,
        ];

        return view($this->baseUrl . '.all', $data);
    }

    public function getOne($id, $failed = false, $father_id = '')
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest($this->getEndpoint($father_id) . '/' . $id, 'GET', [])['data'],
            'failed' => $failed,
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name,
            'father_id' => $father_id,
            'father_url' => $this->father_url
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
            'id_name' => $this->id_name,
        ];

        return view($this->baseUrl . '.all', $data);
    }

    public function form($title, $employeesForForm, $father_id = '')
    {
        // dd($employeesForForm);

        $data = [
            'pageTitle' => $this->pageTitle,
            'title' => $title,
            'base_route' => $this->baseUrl,
            'empleados' => $employeesForForm ? $this->apiRequest($this->uri_prefix . '/' . session('company') . '/employees', 'GET', [])['data'] : [],
            'father_id' => $father_id,
            'father_url' => $this->father_url
        ];

        return view($this->baseUrl . '.form', $data);
    }

    public function create(Request $request, $validationRules, $changes = [], $father_id = '')
    {
        $request->validate($validationRules);

        $data = $this->UpdateRequest($request, $changes);

        $this->apiRequest($this->getEndpoint($father_id), 'POST', $data);

        return $father_id ? redirect()->route($this->father_url . '.one', ['id' => $father_id]) : redirect()->route($this->baseUrl . '.all');
    }

    public function delete($id, $father_id = '')
    {
        $response = $this->apiRequest($this->getEndpoint($father_id) . '/' . $id, 'DELETE', []);

        if ($response['error']) {
            return $this->getOne($id, true, $father_id);
        } else {
            return $father_id ? redirect()->route($this->father_url . '.one', ['id' => $father_id]) : redirect()->route($this->baseUrl . '.all');
        }
    }

    public function update($id, Request $request, $validationRules, $changes = [], $father_id = '')
    {
        $request->validate($validationRules);

        $data = $this->UpdateRequest($request, $changes);

        $this->apiRequest($this->getEndpoint($father_id) . '/' . $id, 'PUT', $data);

        return $father_id ? redirect()->route($this->baseUrl . '.one', ['id' => $id, 'father_id' => $father_id]) : redirect()->route($this->baseUrl . '.one', ['id' => $id]);
    }
}
