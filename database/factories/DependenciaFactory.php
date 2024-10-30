<?php

namespace Database\Factories;

use App\Models\Dependencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class DependenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dependencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'depe_descripcion' => $this->faker->word(),
            'depe_telefono' => $this->faker->numberBetween(600000000, 699999999),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
