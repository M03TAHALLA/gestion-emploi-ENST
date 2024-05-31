<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_filiere',
        'semestre',
        'nom_groupe',
        'id_module',
        'jour',
        'heure_debut',
        'heure_fin',
        'num_salle',
        'cin_enseignant',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
}
