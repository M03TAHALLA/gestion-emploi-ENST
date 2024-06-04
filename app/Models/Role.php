<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_role',
        // Add other fillable fields here if you have any
    ];
    public function sousAdmins()
    {
        return $this->belongsToMany(SousAdmin::class, 'sous_admins', 'role_id', 'id_sous_admin');
    }

    public function rolesAdmins()
    {
        return $this->hasMany(RolesAdmin::class, 'role_id');
    }
    public function sousAdminsRoles()
    {
        return $this->belongsToMany(SousAdmin::class, 'roles_admins', 'role_id', 'id_sous_admin');
    }
}
