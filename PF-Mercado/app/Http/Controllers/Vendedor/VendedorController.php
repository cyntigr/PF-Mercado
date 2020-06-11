<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pedido;
use App\Models\ProductoPuesto;
use App\Models\Puesto;
use Illuminate\Support\Facades\Auth;

class VendedorController extends Controller
{
    /**
     * Redirect view pedidos seller
     * 
     * @return view pedidos
     */
    public function viewOrders(){
        $user = Auth::user();
        $pedidos = DB::table('user')
                    ->join('pedido', 'user.idUsu', '=', 'pedido.idUsu')
                    ->join('producto_puesto', 'pedido.idProPues', '=' , 'producto_puesto.idProPues')
                    ->join('puesto', 'producto_puesto.idPuesto', '=' , 'puesto.idPuesto' )
                    ->select('user.nombre','user.apellido','user.direccion','user.telefono','producto_puesto.nombre as nombreP',
                            'pedido.cantidad','pedido.total','pedido.idPedido','producto_puesto.idPuesto', 'pedido.peso','pedido.fecha','puesto.nombre as nombrePuesto')
                    ->where('puesto.idUsu',$user->idUsu)
                    ->where('pedido.enviado', 0)
                    ->orderBy('pedido.fecha')
                    ->get();
        return view('vendedor/pedidos', ['pedidos' => $pedidos]) ;
    }


    /**
     * View order send of the seller
     * 
     * @return view enviados
     */
    public function viewOrderSend(){
        $user = Auth::user();
        $pedidos = DB::table('user')
                    ->join('pedido', 'user.idUsu', '=', 'pedido.idUsu')
                    ->join('producto_puesto', 'pedido.idProPues', '=' , 'producto_puesto.idProPues')
                    ->join('puesto', 'producto_puesto.idPuesto', '=' , 'puesto.idPuesto' )
                    ->select('user.nombre','user.apellido','user.direccion','user.telefono','producto_puesto.nombre as nombreP',
                            'pedido.cantidad','pedido.total','pedido.idPedido','producto_puesto.idPuesto', 'pedido.peso','pedido.fecha','puesto.nombre as nombrePuesto')
                    ->where('puesto.idUsu',$user->idUsu)
                    ->where('pedido.enviado', 1)
                    ->orderBy('pedido.fecha' ,'desc')
                    ->get();
        return view('vendedor/enviados', ['pedidos' => $pedidos]) ;
    }

    /**
     * Change state of the order to send
     * 
     * @return view pedidos
     */
    public function orderSend(Request $req){

        if($req->has('send')){
            foreach($req->input('send') as $key => $value){
                $pedido = Pedido::where('idPedido',$value)->first();
                $pedido->enviado = 1;
                $pedido->save();
            }
        }
        return redirect()->route('pedidos.view') ;
    }

    /**
     * Redirect view Market Stall
     * 
     * @return view puestos
     * 
     */
    public function viewMarketStall(){
        $puestos   = Puesto::where('idUsu',Auth::user()->idUsu)->get();
        return view('vendedor/puestos',['puestos' => $puestos]);
    }

    /**
     * Page of help of the seller
     * 
     * @return view ayuda
     */
    public function viewHelp(){
        return view('vendedor/ayuda');
    }

    /**
     * Delete a market stall 
     * 
     * @param idPuesto
     * @return view puestos
     * 
     */
    public function deleteMarketStall(Request $req){
        DB::table('puesto')->where('idPuesto',$req->input('idPuesto'))->delete();
        return redirect()->route('puestos.view');
    }

    /**
     * Edit a market stall
     * @param idPuesto
     * @return view editar
     * 
     */
    public function addMarketStall(Request $req){
        if($req->has("idPuesto")){
            $puesto = Puesto::where('idPuesto',$req->input('idPuesto'))->first();
            $productos = ProductoPuesto::where('idPuesto',$puesto->idPuesto)->get() ;
            return view('vendedor/nuevo',['puesto' => $puesto,'productos' => $productos]);
        }
        return view('vendedor/nuevo');
    }

    /**
     *  Save a market stall, if it's new like it's an edition
     * 
     * @param idProPues id of the product if editable
     * @return redirect view puestos
     */
    public function saveMarketStall(Request $req){
        $req->validate([
            'nombre'    => ['required', 'string', 'max:255'],
            'info'      => ['required', 'string', 'max:255'],
            'telefono'  => ['required', 'string', 'size:9'],
            'foto'      => ['image','mimes:jpeg,bmp,png'],
         ]) ;
        
        if($req->has("idPuesto")){
            $puesto = Puesto::where('idPuesto',$req->input('idPuesto'))->first();
            $puesto->nombre   = $req->input('nombre');
            $puesto->info     = $req->input('info');
            $puesto->telefono = $req->input('telefono');
            if($req->has('foto')){
                $req->file('foto')->store('public');
                $puesto->foto  =  $req->file('foto')->hashName();
            }
            $puesto->save();
            return redirect()->route('puestos.view');
        }else{
            if($req->has('foto')){
                $req->file('foto')->store('public');
                $foto  =  $req->file('foto')->hashName();
            }else{
                $foto = 'puesto.jpg';
            }
            Puesto::create([
                'nombre'    => $req->input('nombre'),
                'idUsu'     => Auth::user()->idUsu,
                'foto'      => $foto,
                'telefono'  => $req->input('telefono'),
                'info'      => $req->input('info'),
            ]);
            return redirect()->route('puestos.view');
        }
    }

    /**
     * Redirect view producto of the seller
     * 
     * @param idProPues 
     * @return view producto
     */
    public function newProduct(Request $req){

        if($req->has("idProPues")){
            $producto = ProductoPuesto::where('idProPues',$req->input('idProPues'))->first();

            return view('vendedor/producto',['producto' => $producto]);
        }
        return view('vendedor/producto',['idPuesto' => $req->input('idPuesto') ]);
    }

    /**
     * Delete one product select 
     * @param idProPues is the id of the product
     * @return redirect view puesto
     */
    public function deleteProduct(Request $req){
        $producto = ProductoPuesto::where('idProPues',$req->input('idProPues'))->first();
        $idPuesto = $producto->idPuesto;
        ProductoPuesto::where('idProPues',$req->input('idProPues'))->delete();
        return redirect()->route('puesto.add',['idPuesto' => $idPuesto]);
    }

    /**
     * 
     */
    public function saveProduct(Request $req){
        $req->validate([
            'nombre'      => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:300'],
            'precio'      => ['required', 'numeric'],
            'foto'        => ['image','mimes:jpeg,bmp,png'],
        ]) ;
        
        if($req->has("idProPues")){
            $producto = ProductoPuesto::where('idProPues',$req->input('idProPues'))->first();
            $producto->nombre      = $req->input('nombre');
            $producto->descripcion = $req->input('descripcion');
            $producto->precio      = $req->input('precio');
            $producto->stock       = $req->input('stock');

            if($req->has('foto')){
                $req->file('foto')->store('public');
                $producto->foto  =  $req->file('foto')->hashName();
            }
            $producto->save();
            return redirect()->route('puesto.add',['idPuesto' => $req->input('idPuesto') ]);
        }else{
            if($req->has('foto')){
                $req->file('foto')->store('public');
                $foto  =  $req->file('foto')->hashName();
            }else{
                $foto = 'ejemplo.jpg';
            }
            ProductoPuesto::create([
                'idPuesto'    => $req->input('idPuesto'),
                'nombre'      => $req->input('nombre'),
                'foto'        => $foto,
                'descripcion' => $req->input('descripcion'),
                'precio'      => $req->input('precio'),
                'stock'       => $req->input('stock'),
            ]);
            return redirect()->route('puesto.add',['idPuesto' => $req->input('idPuesto') ]);
        }
    }
}
