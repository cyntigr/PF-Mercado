<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    
    private const ADMIN  = 1;
    private const SELLER = 2;
    private const CLIENT = 3;

    // Array of type user and path 
    //private const PERFILES = ['', 'administrador', 'vendedor','cliente'] ;
    //private const RUTAS    = ['', 'admin', 'seller','client'] ;
    
    protected $primaryKey = 'idUsu' ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
    protected $fillable = [
        'nombre','apellido', 'email', 'password','telefono','idTipo','foto','nif'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check if the user is admin
     * 
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->tipo == User::ADMIN ;
    }

    /**
     * Return the route for the tipe indicated
     * @param  int $tipe user  
     * @return String with the path to which it is redirected 
     */
    public function path():String
    {
        return User::PATHS[$this->tipo] ;
    }
    
}
