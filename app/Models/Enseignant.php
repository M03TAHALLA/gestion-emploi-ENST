<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $table = 'enseignants';

    public function seances() {
        return $this->hasMany(Seance::class, 'cin_enseignant');
    }
    protected $primaryKey = 'cin_enseignant';
    public $incrementing = false;
    protected $keyType = 'string';
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
