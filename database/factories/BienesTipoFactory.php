<?php

namespace Database\Factories;

use App\Models\BienesTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienesTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BienesTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bsti_id' => $this->faker->randomDigitNotNull,
        'btip_descripcion' => $this->faker->word,
        'btip_detalle' => $this->faker->text,
        'btip_costo' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
