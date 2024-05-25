<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filliere extends Model
{
    protected $fillable = [
        'NomFilliere',
        'NomDepartement',
        'Cordinateur',
        'Semestre',
        'NombreGroupe',
        'EmploiTempsDispo',// Ajoutez les autres champs fillables ici si nécessaire
    ];
    use HasFactory;
}
