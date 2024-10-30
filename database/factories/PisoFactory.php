<?php

namespace Database\Factories;

use App\Models\Piso;
use Illuminate\Database\Eloquent\Factories\Factory;

class PisoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Piso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'edif_id' => \App\Models\Edificio::factory(),
            'piso_descripcion' => $this->faker->word(),
            'piso_direccion' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
