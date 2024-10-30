<?php

namespace Database\Factories;

use App\Models\Sector;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sector::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'piso_id' => \App\Models\Piso::factory(),
            'sect_descripcion' => $this->faker->sentence(3),
            'sect_direccion' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
