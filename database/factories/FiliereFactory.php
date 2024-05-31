<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Filiere;
use App\Models\Departement;

class FiliereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filiere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_filiere' => $this->faker->word(),
            'nom_departement' => \App\Models\Departement::inRandomOrder()->first()->nom_departement,
            'cordinateur' => $this->faker->name(),
            'semestre' => $this->faker->numberBetween(1, 8),
            'groupe' => $this->faker->numberBetween(1, 3),
            'liste_etudiant' => $this->faker->boolean(),
            'aac' => '24-25', // Valeur par défaut
        ];
    }
}
