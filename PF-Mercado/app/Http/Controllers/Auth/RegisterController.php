<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        if($data['vendedor'] == 1){
            return Validator::make($data, [
                'name'      => ['required', 'string', 'max:255'],
                'apellido'  => ['required', 'string', 'max:255'],
                'direccion' => ['required', 'string', 'max:300'],
                'telefono'  => ['required', 'string', 'size:9'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'dni'       => ['required', 'string', 'size:9', 'unique:users'],
                'fecNac'    => ['required', 'date','before_or_equal:2002-05-04'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
                'nif'       => ['required', 'max:9'],
            ]);
        }else{
            return Validator::make($data, [
                'name'      => ['required', 'string', 'max:255'],
                'apellido'  => ['required', 'string', 'max:255'],
                'direccion' => ['required', 'string', 'max:300'],
                'telefono'  => ['required', 'string', 'size:9'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'dni'       => ['required', 'string', 'size:9', 'unique:users'],
                'fecNac'    => ['required', 'date','before_or_equal:2002-05-04'],
                'password'  => ['required', 'string', 'min:8', 'confirmed'],
                'nif'       => ['max:9'],
            ]);
        }


        
    }

    /**
     * Create a new user instance after a valid registration.
     * Create dni with first letter in capital letter, before
     * adding to the database.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $letter = strtoupper(substr($data['dni'], -1));
        $number = substr($data['dni'], 0, -1);
        $dni    = $number.$letter;
        if($data['vendedor'] == 1){
            return User::create([
                'nombre'   => $data['name'],
                'apellido' => $data['apellido'],
                'email'    => $data['email'],
                'dni'      => $dni,
                'password' => Hash::make($data['password']),
                'telefono' => $data['telefono'],
                'idTipo'   => 3,
                'vendedor' => $data['vendedor'],
                'direccion'=> $data['direccion'],
                'fecNac'   => $data['fecNac'],
                'foto'     => 'user.jpg',
                'nif'      => $data['nif'],
            ]);
        }else{
            return User::create([
                'nombre'   => $data['name'],
                'apellido' => $data['apellido'],
                'email'    => $data['email'],
                'dni'      => $dni,
                'password' => Hash::make($data['password']),
                'telefono' => $data['telefono'],
                'idTipo'   => 3,
                'vendedor' => $data['vendedor'],
                'direccion'=> $data['direccion'],
                'fecNac'   => $data['fecNac'],
                'foto'     => 'user.jpg',
            ]);
        }
    }
}
