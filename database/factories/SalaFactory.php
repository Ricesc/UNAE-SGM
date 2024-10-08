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
            'sect_id' => $this->faker->randomDigitNotNull,
        'stip_id' => $this->faker->randomDigitNotNull,
        'depe_id' => $this->faker->randomDigitNotNull,
        'sala_descripcion' => $this->faker->word,
        'sala_direccion' => $this->faker->word,
        'sala_capacidad' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
