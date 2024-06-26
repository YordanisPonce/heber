<?php

namespace App\Http\Controllers\Auth;

use App\Degree;
use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private $genClass = 'El';
    private $disClass = 'o';
    private $objName = 'Registro';
    private $objNames = 'Registro';
    private $cName = 'register';
    private $vUrl = 'front.home';
    private $controller = 'home';

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'id_degree' => ['required', 'exists:degrees,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_degree' => $data['id_degree'],
            'role' => RoleHelper::STUDENT,
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function showRegistrationForm()
    {
        $data['title'] = $this->objNames;
        $data['active_menu'] = $this->cName;
        $data['degrees'] = Degree::all();
        return view('auth.register', $data);
    }
}
