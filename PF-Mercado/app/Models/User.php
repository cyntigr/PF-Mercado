<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable 
{ 

    use Notifiable;

    /**
     * 
     * Types of user in database
     */
    private const ADMIN  = 1;
    private const SELLER = 2;
    private const CLIENT = 3;


    /**
     * Name of table
     */
    protected $table = 'user' ;

    /**
     * Primary key of table
     */
    protected $primaryKey = 'idUsu' ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'nombre','apellido', 'email', 'dni', 'password','telefono','idTipo', 'vendedor', 'direccion', 'fecNac', 'foto','nif'
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
    public function esAdministrador():boolean
    {
        return $this->tipo == User::ADMIN ;
    }

    /**
     * Check if the user is seller
     * 
     * @return boolean
     */
    public function esVendedor():boolean
    {
        return $this->tipo == User::SELLER ;
    }

    /**
     * Check if the user is client
     * 
     * @return boolean
     */
    public function esCliente():boolean
    {
        return $this->tipo == User::CLIENT ;
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

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
