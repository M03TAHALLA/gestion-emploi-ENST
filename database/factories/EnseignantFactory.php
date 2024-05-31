<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Enseignant;
use App\Models\Departement;

class EnseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cin_enseignant' => $this->faker->unique()->bothify('???########'),
            'nom_enseignant' => $this->faker->lastName(),
            'prenom_enseignant' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'specialite' => $this->faker->word(),
            'nom_departement' => Departement::inRandomOrder()->first()->nom_departement,
            'date_naissance' => $this->faker->date(),
            'horaire_total' => $this->faker->numberBetween(10, 40),
            'date_affectation' => $this->faker->date(),
            'situation' => $this->faker->randomElement(['Vacataire', 'Permanant']),
            'aac' => '24-25', // Valeur par défaut
        ];
    }
}
