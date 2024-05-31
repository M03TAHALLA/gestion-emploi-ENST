<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_module',
        'id_filiere',
        'volume_horaire',
        'nature_module',
        'cin_enseignant',
        'aac',
        // Add other fillable fields here if you have any
    ];

    // Add any relationships or custom methods here
}

