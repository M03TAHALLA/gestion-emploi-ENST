<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emploitempsstock extends Model
{
    protected $fillable = [
        'NomFilliere',
        'NomGroupe',
        'NomModule',
        'Jour',
        'HeurDebut',
        'HeurFin',
        'NumSalle',
        'TypeSalle',
        'NomEnseignant',
        'PrenomEnseignant'
    ];
    use HasFactory;
}
