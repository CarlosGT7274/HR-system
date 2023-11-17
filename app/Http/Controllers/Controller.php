<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as http_request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * @param string $uri Api uri where the request should be made
     * @param string $method Method for the api request
     * @param array $params for the body of the request to the api
     * @return array
     */
    public function apiRequest($uri, $method, $params)
    {
        $internalRequest = Request::createFromBase(request());

        $internalRequest->server->set('REQUEST_URI', '/api/' . env('API_VERSION') . '/' . $uri);

        $internalRequest->setMethod($method);

        $internalRequest->merge($params);

        $internalRequest->headers->set('Authorization', 'Bearer ' . session('token'));

        $response = app()->handle($internalRequest);

        if ($response->getStatusCode() == 500) {
            return ['error' => true, 'mensaje' => 'Error en el Servidor'];
            // return $response;
        } else {
            $data = json_decode($response->getContent(), true);
            $data['code'] = $response->getStatusCode();
            return $data;
        }
    }

    public function UpdateRequest(http_request $request, $changes)
    {
        $data = [];

        foreach ($request->request as $llave => $valor) {
            if (is_array($valor)) {
                foreach ($valor as $key => $value) {
                    $data[$llave][$key] = $value;

                    foreach ($value as $sub_key => $sub_value) {
                        if (array_key_exists($sub_key, $changes)) {
                            if ($changes[$sub_key] == 'int' && $sub_value) {
                                $data[$llave][$key][$sub_key] = (int) $sub_value;
                            } else if ($changes[$sub_key] == 'datetime') {
                                $data[$llave][$key][$sub_key] = str_replace('T', ' ', $sub_value);
                            } else {
                                $data[$llave][$key][$changes[$sub_key]] = $sub_value;
                                unset($data[$llave][$key][$sub_key]);
                            }
                        }
                    }
                }
            } else {
                if (array_key_exists($llave, $changes)) {
                    if ($changes[$llave] == 'int' && $valor) {
                        $data[$llave] = (int) $valor;
                    } else if ($changes[$llave] == 'datetime') {
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
                                if ($changes[$sub_key] == 'int' && $sub_value) {
                                    $data[$llave][$key][$sub_key] = (int) $sub_value;
                                } else if ($changes[$sub_key] == 'datetime') {
                                    $data[$llave][$key][$sub_key] = str_replace('T', ' ', $sub_value);
                                }
                            }
                        }
                    }
                } else {
                    if (array_key_exists($llave, $changes)) {
                        if ($changes[$llave] == 'int' && $valor) {
                            $data[$llave] = (int) $valor;
                        } else if ($changes[$llave] == 'datetime') {
                            $data[$llave] = str_replace('T', ' ', $valor);
                        }
                    }
                }
            }
        }
        return $data;
    }
}
