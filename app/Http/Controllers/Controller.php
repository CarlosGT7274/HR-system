<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @param string $uri Api uri where the request should be made
     * @param string $method Method for the api request
     * @param array $params for the body of the reuest to the api
     * @return array
     */
    public function apiRequest($uri, $method, $params)
    {
        $internalRequest = Request::create('/api/' . env('API_VERSION') . '/' . $uri, $method, $params);

        $response = app()->handle($internalRequest);

        if ($response->getStatusCode() == 500) {
            return ['error' => true, 'mensaje' => 'Error en el Servidor'];
        } else {
            $data = json_decode($response->getContent(), true);
            $data['code'] = $response->getStatusCode();
            return $data;
        }
    }
}