<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesAdmin extends Model
{
    use HasFactory;
    protected $table = 'roles_admins';

    protected $fillable = ['role_id', 'id_sous_admin'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function sousAdmin()
    {
        return $this->belongsTo(SousAdmin::class, 'id_sous_admin');
    }
}
