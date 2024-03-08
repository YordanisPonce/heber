<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $genClass = 'El';
    private $disClass = 'o';
    private $objName = 'Usuario';
    private $objNames = 'Usuarios';
    private $cName = 'user';
    private $table = 'users';
    private $vUrl = 'admin.user';
    private $controller = 'admin/user';
    private $uploads = 'uploads/user';

    public function index()
    {
        $o_all = User::all();
        $data['o_all'] = $o_all;
        $data['title'] = 'Listado de ' . $this->objNames;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.index', $data);
    }

    public function add(Request $request)
    {
        if($request->method() === 'POST'){
            $validator = Validator::make($request->post(), [
                'name' => 'required',
                'email' => 'required|unique:users',
            ], [
                'name.required' => 'El nombre es requerido',
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo debe ser único',
            ]);
            if($validator->fails()){
                return redirect($this->controller)->with('form_errors', 'Hay errores en los valores del formulario');
            }
            $params = $request->post();
            if($request->hasFile('photo') && $request->file('photo')->isValid()){
                $params['photo'] = $request->file('photo')->store($this->uploads, 'public');
            }
            $params['password'] = Hash::make($params['password']);
            User::create($params);
            return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido agregad' . $this->disClass . ' correctamente');
        }
        $data['title'] = 'Agregar ' . $this->objName;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.add', $data);
    }

    public function edit(Request $request, $id = '')
    {
        $o = User::findOrFail($id);
        if($request->method() === 'POST'){
            $validator = Validator::make($request->post(), [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
            ], [
                'name.required' => 'El nombre es requerido',
                'email.required' => 'El correo es requerido',
                'email.unique' => 'El correo debe ser único',
            ]);
            if($validator->fails()){
                return redirect($this->controller)->with('form_errors', 'Hay errores en los valores del formulario');
            }
            $params = $request->post();
            if($request->hasFile('photo') && $request->file('photo')->isValid()){
                $params['photo'] = $request->file('photo')->store($this->uploads, 'public');
            }
            $params['password'] = (!empty($params['password']))?Hash::make($params['password']):'';
            $o->update($params);
            return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido modificad' . $this->disClass . ' correctamente');
        }
        $data['o'] = $o;
        $data['title'] = 'Actualizar ' . $this->objName;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.edit', $data);
    }

    public function delete($id = '')
    {
        $o = User::findOrFail($id);
        $o->delete();
        return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido eliminad' . $this->disClass . ' correctamente');
    }

    public function change($id = '')
    {
        $o = User::findOrFail($id);
        $o->status = ($o->status=='active')?'inactive':'active';
        $o->save();
        return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido modificad' . $this->disClass . ' correctamente');
    }
}
