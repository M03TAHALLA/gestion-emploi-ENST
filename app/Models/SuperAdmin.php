<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    protected $guard = 'super_admin';

    protected $fillable = [
        'cin', 'nom', 'prenom', 'email', 'password', 'aac',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}