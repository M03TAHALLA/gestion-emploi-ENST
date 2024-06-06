<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    public function emploi_temps()
    {
        return $this->hasMany(EmploiTemps::class, 'id_filiere');
    }

    protected $fillable = [
        'nom_filiere',
        'nom_departement',
        'cordinateur',
        'semestre',
        'groupe',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
    public function seances()
    {
        return $this->hasMany(Seance::class, 'id_filiere');
    }
}

