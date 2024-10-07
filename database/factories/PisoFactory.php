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
            'edif_id' => $this->faker->randomDigitNotNull,
        'piso_descripcion' => $this->faker->word,
        'piso_direccion' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
