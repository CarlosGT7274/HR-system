<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function apiRequest($uri, $method, $params)
    {
        $internalRequest = Request::create($uri, $method, $params);

        $response = Route::dispatch($internalRequest);

        if ($response->getStatusCode() == 500) {
            return ['error' => true, 'mensaje' => 'Error en el Servidor'];
        } else {
            return json_decode($response->getContent(), true);
        }
    }
}
