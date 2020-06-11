<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    /**
     * Name of table
     */
    protected $table = 'favorito' ;

    /**
     * The attributes that are mass assignable, for create the class.
     * 
     * @var array
     */
    
    protected $fillable = [
        'idUsu', 'idPuesto',
    ];

    public $timestamps = false ;

}
