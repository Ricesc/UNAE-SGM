<?php

namespace Database\Factories;

use App\Models\Baja;
use Illuminate\Database\Eloquent\Factories\Factory;

class BajaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Baja::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usu_id' => \App\Models\User::factory(),
            'baja_fecha' => $this->faker->date(),
            'baja_estado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
