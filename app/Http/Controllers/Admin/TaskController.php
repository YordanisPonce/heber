<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    private $genClass = 'La';
    private $disClass = 'a';
    private $objName = 'Tarea';
    private $objNames = 'Tareas';
    private $cName = 'task';
    private $vUrl = 'admin.task';
    private $controller = 'admin/task';
    private $uploads = 'uploads/task';

    public function index()
    {
        $o_all = Task::all();
        $data['o_all'] = $o_all;
        $data['title'] = 'Listado de ' . $this->objNames;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl . '.index', $data);
    }

    public function add(Request $request)
    {
        if ($request->method() === 'POST') {
            $validator = Validator::make($request->post(), [
                'name' => 'required',
                'id_degree' => 'exists:degrees,id'
            ], [
                'name.required' => 'El nombre es requerido',
            ]);
            if ($validator->fails()) {
                return redirect($this->controller)->with('form_errors', 'Hay errores en los valores del formulario');
            }
            $params = $request->post();
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $params['photo'] = $request->file('photo')->store($this->uploads, 'public');
            }
            Task::create($params);
            return redirect($this->controller, Response::HTTP_CREATED)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido agregad' . $this->disClass . ' correctamente');
        }
        $data['title'] = 'Agregar ' . $this->objName;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;

        return view($this->vUrl . '.add', $data);
    }

    public function edit(Request $request, $id = '')
    {
        $o = Task::findOrFail($id);
        if ($request->method() === 'POST') {
            $validator = Validator::make($request->post(), [
                'name' => 'required',
            ], [
                'name.required' => 'El nombre es requerido',
            ]);
            if ($validator->fails()) {
                return redirect($this->controller)->with('form_errors', 'Hay errores en los valores del formulario');
            }
            $params = $request->post();
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $params['photo'] = $request->file('photo')->store($this->uploads, 'public');
            }
            $o->update($params);
            return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido modificad' . $this->disClass . ' correctamente');
        }
        $data['o'] = $o;
        $data['title'] = 'Actualizar ' . $this->objName;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl . '.edit', $data);
    }

    public function delete($id = '')
    {
        $o = Task::findOrFail($id);
        $o->delete();
        return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido eliminad' . $this->disClass . ' correctamente');
    }

    public function change($id = '')
    {
        $o = Task::findOrFail($id);
        $o->status = ($o->status == 'active') ? 'inactive' : 'active';
        $o->save();
        return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido modificad' . $this->disClass . ' correctamente');
    }
}
