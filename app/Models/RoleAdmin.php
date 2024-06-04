<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    use HasFactory;
    
    protected $fillable = ['role_id', 'id_sous_admin'];

    public function sousAdmin()
    {
        return $this->belongsTo(SousAdmin::class, 'id_sous_admin');
    }
}
