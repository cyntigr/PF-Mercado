<?php

namespace App\Models;

/**
 * 
 * Cyntia García Ruiz
 * 2º DAW
 * Curso 2019/20
 * 
 */

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
   /**
    * Name of table
    **/
   protected $table = 'Puesto' ;

   /**
    * Primary key
    **/
   protected $primaryKey = 'idPuesto' ;

   public $timestamps = false ;

   /**
    * Relation 1:N (one to many) 
    * 
    * @return Illuminate\Database\Eloquent\Collection
    */
   public function puesto()
   {
       return $this->hasMany('App\Models\User') ;
   }
}