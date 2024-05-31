<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Departement;
use App\Models\Filiere;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cin_etudiant' => $this->faker->unique()->bothify('???########'),
            'nom_etudiant' => $this->faker->lastName(),
            'prenom_etudiant' => $this->faker->firstName(),
            'nom_departement' => Departement::inRandomOrder()->first()->nom_departement,
            'id_filiere' => Filiere::inRandomOrder()->first()->id,
            'semestre_actuel' => $this->faker->numberBetween(1, 8),
            'email' => $this->faker->unique()->safeEmail(),
            'aac' => '24-25', // Valeur par défaut
        ];
    }
}
