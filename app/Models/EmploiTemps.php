<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiTemps extends Model
{
    use HasFactory;
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }

    protected $fillable = [
        'nom_departement',
        'id_filiere',
        'semestre',
        'groupe',
        'crenau_debut',
        'crenau_fin',
        'aac',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
}

