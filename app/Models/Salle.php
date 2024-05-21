<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [
        'num_salle',
        'nom_departement',
        'type_salle',
        'capacite',
        'disponibilite'
    ];
    use HasFactory;
}
