<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmploiTemps;
use App\Models\Departement;
use App\Models\Filiere;

class EmploiTempsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmploiTemps::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filiere = Filiere::inRandomOrder()->first();

        return [
            'nom_departement' => \App\Models\Departement::inRandomOrder()->first()->nom_departement,
            'id_filiere' => $filiere->id,
            'semestre' => $this->faker->numberBetween(1, 8),
            'groupe' => $this->faker->numberBetween(1, 5),
            'aac' => '24-25', // Valeur par défaut
        ];
    }
}
