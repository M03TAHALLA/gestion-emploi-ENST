<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_salle',
        'nom_departement',
        'type_salle',
        'capacite',
        'disponibilite',
        'aac',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
}
