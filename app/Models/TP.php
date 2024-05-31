<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TP extends Model
{
    use HasFactory;
    protected $table = 'tps';
    protected $fillable = [
        'id_seance',
        // Add other fillable fields here if you have any
    ];
}
