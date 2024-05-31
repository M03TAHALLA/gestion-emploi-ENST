<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Module;
use App\Models\Filiere;
use App\Models\Enseignant;

class ModuleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Module::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_module' => $this->faker->word(),
            'id_filiere' => Filiere::inRandomOrder()->first()->id,
            'volume_horaire' => $this->faker->numberBetween(10, 60),
            'nature_module' => $this->faker->randomElement(['Disciplinaire', 'Complémentaire']),
            'cin_enseignant' => Enseignant::inRandomOrder()->first()->cin_enseignant,
            'aac' => '24-25', // Valeur par défaut
        ];
    }
}
