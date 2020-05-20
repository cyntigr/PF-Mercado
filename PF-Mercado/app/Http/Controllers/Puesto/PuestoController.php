<?php

namespace App\Http\Controllers\Puesto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Puesto ;
use App\Models\ProductoPuesto ;

class PuestoController extends Controller
{

    /**
     * Redirect to view puesto
     */
    public function view(Request $req){
        if (!$req->has('id'))
            return redirect()->route('home') ;

        $id        = $req->input('id');
        $puesto    = Puesto::find($id)->first() ;
        $productos = ProductoPuesto::where('idPuesto',$id)->get();
        return view('cliente/puesto', ['puesto' => $puesto ,'productos' => $productos]);
    }

    /**
     * 
     */
    public function viewBuy(Request $req){
        $idPro     = $req->input('idPro');
        $producto = ProductoPuesto::where('idProPues',$idPro)->first();
        return view('cliente/compra', ['producto' => $producto]);
    }
}
