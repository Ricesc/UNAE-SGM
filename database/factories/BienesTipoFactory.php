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
            'btip_descripcion' => $this->faker->word(),
            'btip_detalle' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
