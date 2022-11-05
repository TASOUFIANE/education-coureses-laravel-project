<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;




class Admin extends Authenticatable
{
    
    use Notifiable;

   
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

   
    protected $hidden = [
        'password',
       
    ];

    
}
