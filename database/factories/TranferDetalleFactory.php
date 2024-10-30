<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TranferDetalleFactory extends Factory
{
    protected $model = \App\Models\TranferDetalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tran_id' => \App\Models\Transferencia::factory(),
            'bien_id' => \App\Models\Bien::factory(),
            'trdet_estado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
