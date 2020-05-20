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
use Illuminate\Support\Facades\Auth;
use App\Models\Puesto;
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
        return view('home', ['puestos' => $puestos]) ;
    }
}
