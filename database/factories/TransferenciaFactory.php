<?php

namespace Database\Factories;

use App\Models\Transferencia;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransferenciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transferencia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sala_id' => \App\Models\Sala::factory(),
            'usu_id' => \App\Models\User::factory(),
            'tran_fecha' => $this->faker->date(),
            'tran_procesado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
