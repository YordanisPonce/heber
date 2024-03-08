<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private $genClass = 'El';
    private $disClass = 'o';
    private $objName = 'Perfil';
    private $objNames = 'Perfiles';
    private $cName = 'profile';
    private $table = 'users';
    private $vUrl = 'admin.profile';
    private $controller = 'admin/profile';
    private $uploads = 'uploads/user';

    public function index(Request $request)
    {
        $o = User::findOrFail(Auth::user()->id);
        if($request->method() === 'POST'){
            $validator = Validator::make($request->post(), [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.Auth::user()->id,
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
            Auth::user()->name = $params['name'];
            Auth::user()->email = $params['email'];
            Auth::user()->photo = (!empty($params['photo']))?$params['photo']:(Auth::user()->photo);
            return redirect($this->controller)->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' ' . $this->objName . ' ha sido modificad' . $this->disClass . ' correctamente');
        }
        $data['o'] = $o;
        $data['title'] = 'Actualizar ' . $this->objName;
        $data['objName'] = $this->objName;
        $data['objNames'] = $this->objNames;
        $data['controller'] = $this->controller;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl.'.index', $data);
    }
}
