<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Salle;

class SalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'num_salle' => $this->faker->unique()->numberBetween(1,50),
            'nom_departement' => \App\Models\Departement::inRandomOrder()->first()->nom_departement,
            'type_salle' => $this->faker->randomElement(['Salle', 'Amphi', 'Laboratoire']),
            'capacite' => $this->faker->numberBetween(30, 200),
            'disponibilite' => $this->faker->boolean(),
            'aac' => '24-25',
        ];
    }
}
