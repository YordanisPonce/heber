<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Result;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    private $genClass = 'La';
    private $disClass = 'a';
    private $objName = 'Reporte';
    private $objNames = 'Reportes';
    private $cName = 'report';
    private $vUrl = 'admin.report';
    private $controller = 'admin/report';
    private $uploads = 'uploads/report';

    public function index(Request $request)
    {
        $o_all = [];
        if($request->method() === 'POST'){
            $query = "SELECT * FROM results";
            $conditions = [];
            $params = $request->post();
            if(!empty($request->post('id_task'))){
                if(empty($conditions)){
                    $query .= " WHERE id_task = ?";
                }else{
                    $query .= " AND id_task = ?";
                }
                $conditions[] = $request->post('id_task');
            }
            if(!empty($request->post('id_user'))){
                if(empty($conditions)){
                    $query .= " WHERE id_user = ?";
                }else{
                    $query .= " AND id_user = ?";
                }
                $conditions[] = $request->post('id_user');
            }
            if(!empty($conditions)){
                $query .= " AND status = 'active' ORDER BY 'id' DESC";
            }else{
                $query .= " WHERE status = 'active' ORDER BY 'id' DESC";
            }
            $o_all = DB::select($query, $conditions);
            if(!empty($request->post('id_degree'))){
                foreach($o_all as $key => $value){
                    $modelUser = new \App\User();
                    $user = $modelUser->find($value->id_user);
                    if($user->id_degree!=$request->post('id_degree')){
                        unset($o_all[$key]);
                    }
                }
            }
            if(!empty($o_all)){
                session()->flash('form_success', 'Se han encontrado '.count($o_all).' en la plataforma');
            }
        }else{
            $o_all = Result::all();
        }
        $data['o_all'] = $o_all;
        $data['title'] = 'Buscar Información';
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.index', $data);
    }
}
