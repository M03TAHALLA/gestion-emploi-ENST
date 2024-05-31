<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(UsersTableSeeder::class);

        $this->call([
            DepartementSeeder::class,
            SalleSeeder::class,
            FiliereSeeder::class,
            EmploiTempsSeeder::class,
            EnseignantSeeder::class,
            ModuleSeeder::class,
            SeanceSeeder::class,
            EtudiantSeeder::class,
            TPSeeder::class,
        ]);
    }
}
