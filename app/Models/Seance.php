<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    public function module() {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function enseignant()
{
    return $this->belongsTo(Enseignant::class, 'cin_enseignant', 'cin_enseignant');
}

public function salle()
{
    return $this->belongsTo(Salle::class, 'num_salle', 'num_salle');
}
    protected $fillable = [
        'id_filiere',
        'type_seances',
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
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
}
