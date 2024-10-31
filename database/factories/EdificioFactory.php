<?php

namespace Database\Factories;

use App\Models\Edificio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EdificioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Edificio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'edif_descripcion' => $this->faker->unique()->company(),
            'edif_direccion' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
