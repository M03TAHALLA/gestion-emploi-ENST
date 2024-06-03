<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function seances() {
        return $this->hasMany(Seance::class, 'id_module');
    }

    public function enseignant()
{
    return $this->belongsTo(Enseignant::class, 'cin_enseignant', 'cin');
}

protected $fillable = [
    'nom_module',
    'id_filiere',
    'volume_horaire',
    'nature_module',
    'cin_enseignant',
    'aac',
    'semestre',  // Ajoutez ce champ ici
];

    // Add any relationships or custom methods here
}

