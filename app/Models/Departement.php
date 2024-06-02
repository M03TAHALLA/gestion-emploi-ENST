<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

        protected $primaryKey = 'nom_departement';
        public $incrementing = false;
        protected $keyType = 'string';

        protected $fillable = [
            'nom_departement',
            'aac',
        ];
}

