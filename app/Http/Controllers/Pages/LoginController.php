<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
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
            'message' =>  session('token')
        ];

        return view('forms.login', $data);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | string',
        ]);

        $data = $this->apiRequest('login', 'POST', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($data['error']) {
            return view('forms.login', ['message' => $data['mensaje']]);
        } else {
            session(['token' => $data['data']['token']]);
            session(['user' => $data['data']['usuario']]);
            session(['permissions' => $data['data']['permisos']]);
            return redirect()->route('home');
        }
    }
}
