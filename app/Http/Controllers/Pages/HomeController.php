<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function home(Request $request)
    {

        if (session('token')) {
            echo 'Bearer ' . session('token');
        } else {
            echo 'No tengo Token';
        }

        // return view('home.home', ['user' => session('user')]);

        print_r($request->headers->get('authorization'));

        $response = $this->apiRequest('me', 'GET', []);

        print_r($response);
    }
}