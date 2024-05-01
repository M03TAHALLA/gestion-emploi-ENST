<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends User
{
    protected $table = 'enseignant';
    protected $fillable = [
        'CIN',
    ];

    use HasFactory;
}
