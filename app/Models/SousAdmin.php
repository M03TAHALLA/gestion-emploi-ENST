<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousAdmin extends Model
{
    use HasFactory;
    protected $fillable = ['cin', 'matricule', 'nom', 'prenom', 'email', 'password', 'aac'];

    public function rolesAdmins()
    {
        return $this->hasMany(RolesAdmin::class, 'id_sous_admin');
    }

}
