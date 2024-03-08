<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $genClass = 'El';
    private $disClass = 'o';
    private $objName = 'Dashboard';
    private $objNames = 'Dashboard';
    private $cName = 'home';
    private $vUrl = 'front.home';
    private $controller = 'home';
    private $uploadPath = 'uploads/home';

    public function index()
    {
        $data['title'] = $this->objNames;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.index', $data);
    }
}
