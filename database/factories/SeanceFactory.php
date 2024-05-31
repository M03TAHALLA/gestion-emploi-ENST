<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seance;
use App\Models\Filiere;
use App\Models\Module;
use App\Models\Enseignant;
use App\Models\Salle;

class SeanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_filiere' => Filiere::inRandomOrder()->first()->id,
            'semestre' => $this->faker->numberBetween(1, 8),
            'nom_groupe' => $this->faker->numberBetween(1, 5),
            'id_module' => Module::inRandomOrder()->first()->id,
            'jour' => $this->faker->randomElement(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi']),
            'heure_debut' => $this->faker->time(),
            'heure_fin' => $this->faker->time(),
            'num_salle' => Salle::inRandomOrder()->first()->num_salle,
            'cin_enseignant' => Enseignant::inRandomOrder()->first()->cin_enseignant,
        ];
    }
}
