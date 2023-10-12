<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function login()
    {
        session(['token' => '']);

        $data = [
            'pageTitle' => 'Login',
            'message' =>  ''
        ];

        return view('forms.login', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'correo' => 'required | email',
            'contraseña' => 'required | string',
        ]);

        $response = $this->apiRequest('login', 'POST', [
            'email' => $request->correo,
            'password' => $request->contraseña,
        ]);

        if ($response['error']) {
            return view('forms.login', [
                'pageTitle' => 'Login',
                'message' =>  $response['mensaje']
            ]);
        } else {
            session(['token' => $response['data']['token']]);
            session(['user' => $response['data']['usuario']]);
            session(['permissions' => $response['data']['permisos']]);
            return redirect()->route('home');
        }
    }

    public function getEmail()
    {
        $data = [
            'pageTitle' => 'Restablecer Contraseña',
            'message' =>  ''
        ];

        return view('forms.resetPassword', $data);
    }

    public function sendToken(Request $request)
    {
        $request->validate([
            'correo' => 'required | email',
        ]);

        $response = $this->apiRequest('resetToken', 'GET', [
            'email' => $request->correo,
        ]);

        if ($response['code'] == 200) {
            return view('forms.emailSend');
        } else {
            $data = [
                'pageTitle' => 'Restablecer Contraseña',
                'message' =>  $response['mensaje']
            ];

            return view('forms.resetPassword', $data);
        }
    }
}
