<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido ;
use Illuminate\Support\Facades\Validator;


class PedidoController extends Controller
{
    /**
     * Shows pendings orders of the user
     * @return shopping basket
     */
    public function pendingOrders(){
        $user = Auth::user();

        $pedidos = DB::table('pedido')
                    ->join('producto_puesto','pedido.idProPues', '=', 'producto_puesto.idProPues')
                    ->select('pedido.idPedido','pedido.cantidad','pedido.peso','pedido.total',
                            'producto_puesto.nombre','producto_puesto.foto')
                    ->where('pedido.idUsu',$user->idUsu)
                    ->where('pedido.pagado',0)
                    ->get();
                    
    	return view('cliente/cesta',['pedidos' => $pedidos ,'cesta' => $user->shoppingBasket()]) ;
    }

    
    /**
     * Shows order of the user, in the view pedidos
     * @return orders of the user
     */
    public function orders(){
        $user = Auth::user();

        $pedidos = DB::table('pedido')
                    ->join('producto_puesto','pedido.idProPues', '=', 'producto_puesto.idProPues')
                    ->join('puesto','producto_puesto.idPuesto', '=','puesto.idPuesto' )
                    ->select('pedido.enviado','pedido.cantidad','pedido.peso','pedido.fecha',
                            'puesto.nombre as puesto','pedido.total','producto_puesto.nombre','producto_puesto.foto')
                    ->where('pedido.idUsu',$user->idUsu)->where('pedido.pagado',1)->get();
    	return view('cliente/pedidos',['pedidos' => $pedidos ,'cesta' => $user->shoppingBasket()]) ;
    }

    /**
     * Delete order of database
     * @return cesta of user
     */
    public function deleteOrder(Request $req){
        $pedido = Pedido::where('idPedido',$req->input('id'));
        $pedido->delete();
    	return redirect()->route('pedido.cesta') ;
    }

    /**
     * Pay order of the user 
     * @return shopping basket
     */
    public function payOrder(Request $req){
        if(null !== $req->input('pay')){
            $user = Auth::user();
            $data = [
                'tarjeta'   => $user->tarjeta ,
                'caducidad' => $user->caducidad ,
                'cvc'       => $user->cvc ];

            $validator = Validator::make($data, [
                'tarjeta'   => ['required','numeric','max:12341234123412341'],
                'caducidad' => ['required','string','max:7'],
                'cvc'       => ['required','numeric','max:1234'],
            ]);

            if (!$validator->fails()) {
                foreach($req->input('pay') as $key => $value){
                    $pedido = Pedido::where('idPedido',$value)->first();
                    $pedido->pagado = 1;
                    $pedido->save();
                }
                return redirect()->route('pedido.cesta') ;
            }
            else{

                return redirect()->route('pedido.cesta')
                            ->withErrors($validator)
                            ->withInput();
            }
        }
        return redirect()->route('pedido.cesta') ;
    }
}
