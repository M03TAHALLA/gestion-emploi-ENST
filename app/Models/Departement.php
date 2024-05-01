<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $table = 'departement';
    protected $fillable = [
        'NomDepartement',
        'NomChefDepartement',
    ];

    public function filliere(){
        return $this->hasMany(Filliere::class);
    }

    use HasFactory;
}
