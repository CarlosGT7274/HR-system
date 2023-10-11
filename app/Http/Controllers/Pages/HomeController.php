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
        print_r($request->headers->get('authorization'));

        $response = $this->apiRequest('me', 'GET', []);

        return view('home.home', ['pageTitle' => 'Home', 'user' => $response['data']]);
    }
}