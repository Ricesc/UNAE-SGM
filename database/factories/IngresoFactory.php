<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingreso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prov_id' => \App\Models\Proveedor::factory(),
            'usu_id' => \App\Models\User::factory(),
            'ing_fecha_compra' => $this->faker->date(),
            'ing_costo_total' => $this->faker->numberBetween(1000, 10000000),
            'ing_estado' => $this->faker->numberBetween(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
