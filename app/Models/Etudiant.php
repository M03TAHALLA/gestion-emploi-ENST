<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends User
{
    protected $table = 'etudiant';
    protected $fillable = [
        'CNE',
        'CNI',
        'Age',
        'HeursAbsence',
        'NumParent',
        'idFilliere',
       
    ];

    use HasFactory;
}
