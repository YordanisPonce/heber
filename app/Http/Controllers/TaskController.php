<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $genClass = 'La';
    private $disClass = 'a';
    private $objName = 'Tarea';
    private $objNames = 'Tareas';
    private $cName = 'task';
    private $vUrl = 'front.task';
    private $controller = 'task';
    private $uploads = 'uploads/task';

    public function index()
    {
        $o_all = Task::where(['status' => 'active', 'id_degree' => Auth::user()->id_degree])->get();
        $data['o_all'] = $o_all;
        $data['title'] = 'Listado de ' . $this->objNames;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.index', $data);
    }
}
