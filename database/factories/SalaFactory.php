<?php

namespace Database\Factories;

use App\Models\Sala;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sala::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sect_id' => \App\Models\Sector::factory(),
            'stip_id' => \App\Models\SalasTipo::factory(),
            'depe_id' => \App\Models\Dependencia::factory(),
            'sala_descripcion' => $this->faker->sentence(3),
            'sala_direccion' => $this->faker->address(),
            'sala_capacidad' => $this->faker->numberBetween(10, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
