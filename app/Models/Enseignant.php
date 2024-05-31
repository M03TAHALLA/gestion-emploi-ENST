<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $table = 'enseignants';
    protected $fillable = [
        'cin_enseignant',
        'nom_enseignant',
        'prenom_enseignant',
        'email',
        'specialite',
        'nom_departement',
        'date_naissance',
        'horaire_total',
        'date_affectation',
        'situation',
        'aac',
        // Add other fillable fields here if you have any
    ];

    use HasFactory;
}
