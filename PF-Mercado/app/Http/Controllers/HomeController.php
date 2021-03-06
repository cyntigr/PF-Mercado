<?php

namespace App\Http\Controllers;

/**
 * 
 * Cyntia García Ruiz
 * 2º DAW
 * Curso 2019/20
 * 
 */

use Illuminate\Http\Request;
use App\Models\Puesto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function indexWelcome()
    {
        return view('welcome');
    }

    
    /**
     * Show the first page for the application
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $puestos = DB::table('puesto')->paginate(8);
        if(Auth::guest()){
            return view('home', ['puestos' => $puestos]) ;
        }else{
            $user = Auth::user();
            return view('home', ['puestos' => $puestos,'cesta' => $user->shoppingBasket()]) ;
        }
    }
}
