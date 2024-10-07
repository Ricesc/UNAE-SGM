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
            'sala_id' => $this->faker->randomDigitNotNull,
        'usu_id' => $this->faker->randomDigitNotNull,
        'tran_fecha' => $this->faker->word,
        'tran_procesado' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
