<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngresosDetFactory extends Factory
{

    protected $model = \App\Models\IngresosDet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ing_id' => \App\Models\Ingreso::factory(),
            'btip_id' => \App\Models\BienesTipo::factory(),
            'idet_cantidad' => $this->faker->numberBetween(1, 100),
            'idet_estado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
