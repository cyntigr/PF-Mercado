<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * Name of table
     */
    protected $table = 'pedido' ;

    /**
     * Primary key of table
     */
    protected $primaryKey = 'idPedido' ;

    /**
     * The attributes that are mass assignable, for create the class.
     *
     * @var array
     */
    
    protected $fillable = [
        'idUsu', 'idProPues', 'cantidad', 'peso','total','pagado','enviado'
    ];

}
