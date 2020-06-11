<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable 
{ 

    use Notifiable;

    /**
     * 
     * Types of user in database
     */
    private const TYPES = ['', 'admin', 'seller','client'] ;


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
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }


    /**
     * Send number of orders in the shopping basket
     * 
     */
    public function shoppingBasket(){
        
        return DB::table('pedido')->where('idUsu', $this->idUsu )->where('pagado',0)->count();
    }

    /**
     * Check that you have a card
     * to make the payment of order
     * 
     * @return boolean
     */
    public function checkCard():bool{
        if( empty($this->tarjeta) || empty($this->cvc) || empty($this->caducidad)){
            return false;
        }
        return true;
    }

    /**
     * Check what type is the user 
     * 
     * @return boolean
     */
    public function checkType($type):bool{

        return $this->idTipo == array_search($type, User::TYPES) ;
    }
}
