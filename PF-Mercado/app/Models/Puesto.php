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
   protected $table = 'puesto' ;

   /**
    * Primary key
    **/
   protected $primaryKey = 'idPuesto' ;

   public $timestamps = false ;

   /**
     * The attributes that are mass assignable, for create the class.
     *
     * @var array
     */
    
    protected $fillable = [
        'nombre', 'idUsu', 'foto', 'telefono','info',
    ];

}