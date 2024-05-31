<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmploiTemps;

class EmploiTempsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmploiTemps::factory()->count(10)->create();
    }
}
