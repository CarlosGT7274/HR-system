<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Routing\ControllerDispatcher;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
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
        $internalRequest = Request::create('/api/' . env('API_VERSION') . '/' . $uri, $method, $params, [], [], $_SERVER);
        $internalRequest->headers->set('Authorization', 'Bearer ' . session('token'));

        $response = app()->handle($internalRequest);

        if ($response->getStatusCode() == 500) {
            return ['error' => true, 'mensaje' => 'Error en el Servidor'];
        } else {
            $data = json_decode($response->getContent(), true);
            $data['code'] = $response->getStatusCode();
            return $data;
        }
    }

    function internalRequest($uri, $method , $data )
{


    $int = Request::create('/api/' . env('API_VERSION') . '/' . $uri , $method, $data,[], [], $_SERVER);
   
    $int->headers->set('Authorization', 'Bearer ' . session('token'));

    $response = Route::dispatch($int);

    if ($response->getStatusCode() == 500) {
        return ['error' => true, 'mensaje' => 'Error en el Servidor'];
    } else {
        $data = json_decode($response->getContent(), true);
        $data['code'] = $response->getStatusCode();
        return $data;
    }

}
}