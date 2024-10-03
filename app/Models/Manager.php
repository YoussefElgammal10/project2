<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable 
{
    use Notifiable;

    protected $table = 'managers';

   
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}


