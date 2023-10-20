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
    public function __construct(private $uri, private $pageTitle, private $baseUrl, private $id_name)
    {
    }

    public function getAll($view)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $this->uri, 'GET', [])['data'],
            'nombre' => '',
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($view, $data);
    }

    public function getOne($id, $view, $failed = false)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $id, 'GET', [])['data'],
            'failed' => $failed,
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($view, $data);
    }

    public function search(Request $request,  $view)
    {
        $request->validate([
            'nombre' => 'required | string',
        ]);

        $data = [
            'pageTitle' => $this->pageTitle,
            'data' => $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $request->nombre, 'GET', [])['data'],
            'nombre' => $request->nombre,
            'base_route' => $this->baseUrl,
            'id_name' => $this->id_name
        ];

        return view($view, $data);
    }

    public function form($view, $title)
    {
        $data = [
            'pageTitle' => $this->pageTitle,
            'title' => $title,
            'base_route' => $this->baseUrl,
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

        $this->apiRequest('companies/' . session('company') . '/' . $this->uri, 'POST', $data);

        return redirect()->route($route);
    }

    public function delete($id, $route, $failed_view)
    {
        $response = $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $id, 'DELETE', []);

        if ($response['error']) {
            return $this->getOne($id, $failed_view, true);
        } else {
            return redirect()->route($route);
        }
    }

    public function update($id, $route, Request $request, $validationRules, $changes = [])
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

        $this->apiRequest('companies/' . session('company') . '/' . $this->uri . '/' . $id, 'PUT', $data);

        return redirect()->route($route, ['id' => $id]);
    }
}