<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmploiTemps extends Model
{
    protected $table = 'emploi_temps';
    protected $fillable = [
        'idFilliere',
        'idEnseignant',
        'idMatiere',
        'idSalle',
        'Jour',
        'HeurDebut',
        'HeurFin',
    ];

   
    use HasFactory;
}
