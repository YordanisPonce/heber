<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Result;
use App\User;
use Illuminate\Http\Response;

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
        if ($request->method() === 'POST') {
            $params = $request->post();
            if (!empty($params['id_task'])) {
                $o_all = Result::where('id_task', $params['id_task'])->get();
            } elseif (!empty($params['id_user'])) {
                $o_all = Result::where('id_user', $params['id_user'])->get();
            } elseif (!empty($params['id_user']) && !empty($params['id_task'])) {
                $o_all = Result::where(['id_user' => $params['id_user'], 'id_task' => $params['id_task']])->get();
            }
            if (!empty($o_all)) {
                session()->flash('form_success', 'Se han encontrado ' . count($o_all) . ' en la plataforma');
            }
        } else {
            $o_all = Result::all();
        }
        $data['o_all'] = $o_all;
        $data['title'] = 'Buscar Información';
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl . '.index', $data);
    }

    public function notify(Request $request)
    {

        $request->validate(
            [
                'users' => 'required|array',
                'users.*' => 'numeric',
            ]
        );

        $users = $request->input('users', []);
         User::whereIn('id', $users)->get()->each(function (User $item) {
            $item->notifyFamiliar();
        });

        return redirect()->back()->with('form_success', 'Notificación enviada satisfactoriamente');
    }
}
