<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use App\Models\User;
use App\Models\Puesto;
use App\Models\ProductoPuesto;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    /**
     * 
     * Check if email exist
     * 
     * @param email 
     * @return response Json
     * 
     */
    public function email(String $correo){
        $usuario = User::where('email',$correo)->first();

        if(empty($usuario)){
            return response()->json('no');
        } else{
            return response()->json('existe');
        } 
    }

    /**
     * 
     * Check if dni exist and if valid during register
     * 
     * @param dni
     * @return response Json
     * 
     */

    public function dniCheck(string $dni) {
        if(strlen($dni)<9) {
            return response()->json('corto');
        }else{
            $letra = strtoupper(substr($dni, -1));
            $numeros = substr($dni, 0, -1);
            if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra
                && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                $existe = User::where('dni',$dni)->first();
                if(!empty($existe)){
                    return response()->json('existe');
                }else{
                    return response()->json('correcto');
                }
            }
            else {
                return response()->json('incorrecto');
            }
        }
    }

    /**
     * 
     * Doing a search for market stall  
     * @return market stall
     * 
     */
    public function searchMarket(string $search){

        $puestos = Puesto::where('nombre','like', '%' . $search . '%')->get();
        return  $puestos;
    }

    /**
     * Search all market stall of the database
     * @return response json
     */
    public function marketStall(){
        $puestos = DB::table('puesto')->get();
        return response()->json($puestos);
    }

    /**
     * Search one market stall of the database
     * @return response json
     */
    public function findMarketStall(int $id){
        $puesto = DB::table('puesto')->where('idPuesto', $id)->get();
        return response()->json($puesto);
    }

    /**
     * 
     * Search all products of the database
     * @return response json
     */
    public function products(){
        $productos = DB::table('producto_puesto')->get();
        return response()->json($productos);
    }

    /**
     * 
     * Search one products of the database
     * @return response json
     */
    public function findProduct(int $id){
        $product = DB::table('producto_puesto')->where('idProPues',$id)->get();
        return response()->json($product);
    }
}