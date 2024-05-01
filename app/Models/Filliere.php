<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filliere extends Model
{
    protected $table = 'filliere';
    protected $fillable = [
        'NomFilliere',
        'NomChefFilliere',
        'idDepartement',

    ];

    public function departement(): BelongsTo{
        return $this->belongsTo(Departement ::class ,'idDepartement');
    }

    use HasFactory;
}
