<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoPuesto extends Model
{
    /**
    * Name of table
    **/
   protected $table = 'producto_puesto' ;

   /**
    * Primary key
    **/
   protected $primaryKey = 'idProPues' ;

   public $timestamps = false ;

   /**
     * The attributes that are mass assignable, for create the class.
     *
     * @var array
     */
    
    protected $fillable = [
        'idPuesto', 'nombre', 'foto', 'descripcion','precio', 'stock',
    ];

}
