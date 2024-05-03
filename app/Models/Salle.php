<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = 'salle';

    protected $fillable = [
        'NumSalle',
        'SalleDispo',
    ];

    use HasFactory;
}

