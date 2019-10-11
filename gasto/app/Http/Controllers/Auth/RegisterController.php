<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Captcha;

class RegisterController extends Controller
{
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
    protected $redirectTo = '/home';

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
           'idrol' => ['required', 'integer'],
            'username' =>'required|string|max:255|unique:users',
            'nombre' => ['required', 'string','max:255'],
            'apellidos' => ['required', 'string','max:255'],
            'ci' => ['required', 'string','max:8'],
            'direccion' => ['required', 'string','max:100'],
             'telefono' => ['required', 'string','max:255'],
             'genero' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'captcha' => 'required|captcha',
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
            'idrol' => $data['idrol'],
            'username' => $data['username'],
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'ci' => $data['ci'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'genero' => $data['genero'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);
    }

    public function refreshCaptcha()
    {

        return  captcha_img();
    }
}
