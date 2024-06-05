<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $primaryKey = 'cin_etudiant';
    public $incrementing = false;
    protected $fillable = [
        'cin_etudiant',
        'nom_etudiant',
        'prenom_etudiant',
        'nom_departement',
        'id_filiere',
        'semestre_actuel',
        'email',
        'aac',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
}
