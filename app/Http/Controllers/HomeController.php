<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $genClass = 'El';
    private $disClass = 'o';
    private $objName = 'Dashboard';
    private $objNames = 'Inicio';
    private $cName = 'home';
    private $vUrl = 'front.home';
    private $controller = 'home';
    private $uploadPath = 'uploads/home';

    private $uploads = 'uploads/user';


    public function index()
    {
        $data['title'] = $this->objNames;
        $data['active_menu'] = $this->cName;
        return view($this->vUrl . '.index', $data);
    }


    public function profile()
    {
        $data['title'] = $this->objNames;
        $data['active_menu'] = 'profile';
        $data['degrees'] = Degree::all();
        return view($this->vUrl . '.profile', $data);
    }

    public function updateProfile(Request $request)
    {
        $idUser = auth()->id();
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', "unique:users,id,$idUser"],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
        $data['title'] = $this->objNames;
        $data['active_menu'] = 'profile';
        $data['degrees'] = Degree::all();
        $params = $request->except('photo');
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $params['photo'] = $request->file('photo')->store($this->uploads, 'public');
        }

        auth()->user()->update($params);
        return redirect('/profile')->with('form_success', 'Enahorabuena!! ' . $this->genClass . ' perfil ha sido modificad' . $this->disClass . ' correctamente');
    }
}
