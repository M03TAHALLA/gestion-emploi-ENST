<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departement;

class DepartementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_departement' => $this->faker->unique()->word(),
            'aac' => '24-25', // Valeur par défaut, peut être personnalisée si nécessaire
        ];
    }
}
