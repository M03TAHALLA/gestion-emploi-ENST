<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SousAdmin extends Authenticatable
{
    protected $guard = 'sous_admin';

    protected $fillable = [
        'cin', 'matricule', 'nom', 'prenom', 'email', 'password', 'aac',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function rolesAdmins()
    {
        return $this->hasMany(RolesAdmin::class, 'id_sous_admin');
    }
}
