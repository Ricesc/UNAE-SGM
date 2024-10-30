<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BajasDetFactory extends Factory
{

    protected $model = \App\Models\BajasDet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'baja_id' => \App\Models\Baja::factory(),
            'bien_id' => \App\Models\Bien::factory(),
            'bdet_estado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
