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
            'bsti_id' => \App\Models\BienesSubTipo::factory(),
            'btip_descripcion' => $this->faker->word(),
            'btip_detalle' => $this->faker->sentence(),
            'btip_costo' => $this->faker->numberBetween(100, 1000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
