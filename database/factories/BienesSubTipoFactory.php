<?php

namespace Database\Factories;

use App\Models\BienesSubTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienesSubTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BienesSubTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'btip_id' => \App\Models\BienesTipo::factory(),
            'bsti_descripcion' => $this->faker->word(),
            'bsti_detalle' => $this->faker->sentence(),
            'bsti_costo' => $this->faker->numberBetween(100, 1000000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
