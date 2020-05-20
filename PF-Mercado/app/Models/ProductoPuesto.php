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

}
