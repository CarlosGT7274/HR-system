<?php 

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class systemController extends Controller
{

 /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(private $uri, private $titlepage) {

    }

    public function getviewAll($view) { 
        $data = [
            'pageTitle'=> $this->titlepage,
            'data'=> $this->apiRequest('rols', 'GET', [])['data']
        ];

        return view($view, $data);
    }

    public function editprofile($view, $id){
        $data = [
            'pageTitle'=> $this->titlepage,
            'data'=> $this->apiRequest('rols' . '/' . $id, 'GET', [])['data'],
            'permisosG' => $this->apiRequest('privileges', 'GET', [])['data']
        ];

        return view($view, $data);
    }
    
}

?>