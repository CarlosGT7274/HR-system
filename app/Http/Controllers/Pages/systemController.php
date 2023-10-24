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

        return view($view, ["pageTitle"=> $this->titlepage]);
    }

    
}

?>