<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User ;

class AdminController extends Controller
{
    /**
     * View users in the database
     * 
     * @param 
     * @return view usuarios
     */
    public function viewUsers(){
        $usuarios = DB::table('user')->get();
        return view('admin/usuarios',['usuarios' => $usuarios]);
    }

    /**
     * Change type of user
     * 
     * @param req dni of user, type of user
     * 
     * @return view usuarios
     */
    public function changeType(Request $req){
        
        DB::table('user')->where('dni',$req->input('dni'))->update(['idTipo' => $req->input('tipo')]);

        return redirect()->route('usuarios');
    }

    /**
     * Delete user with your dni
     * @param req dni of user
     * @return view usuarios
     */
    public function deleteUser(Request $req){
        DB::table('user')->where('dni',$req->input('dni'))->delete();

        return redirect()->route('usuarios');
    }

    /**
     * Redirect to view puestos
     * 
     * @param
     * @return puestos 
     */
    public function viewMarketStall(){

        $puestos = DB::table('puesto')
                    ->join('user', 'puesto.idUsu', '=', 'user.idUsu')
                    ->select('puesto.*','user.nombre as name','user.email','user.nif')
                    ->get();
            
        return view('admin/puestos', ['puestos' => $puestos]) ;
    }

    /**
     * Delete one market stall 
     * 
     * @param req idPuesto for delete
     * @return view puestos
     */
    public function deleteMarketStall(Request $req){
        DB::table('puesto')->where('idPuesto',$req->input('idPuesto'))->delete();
        return redirect()->route('puestos');
    }

    /**
     * Redirect to view productos
     * 
     * @param
     * @return productos
     */
    public function viewProducts(){
        $productos = DB::table('producto_puesto')
                    ->join('puesto', 'producto_puesto.idPuesto', '=', 'puesto.idPuesto')
                    ->join('user', 'puesto.idUsu', '=' , 'user.idUsu')
                    ->select('producto_puesto.*','puesto.nombre as nomb','user.nombre as name','user.nif')
                    ->get();
        return view('admin/productos', ['productos' => $productos]) ;
    }

    /**
     * Delete one product
     * 
     * @param req idProPues for delete 
     * @return view productos
     */
    public function deleteProduct(Request $req){
        DB::table('producto_puesto')->where('idProPues',$req->input('idPro'))->delete();
        return redirect()->route('productos');
    }

}
