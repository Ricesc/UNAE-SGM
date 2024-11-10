<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prov_nombre' => $this->faker->company(),
            'prov_telefono' => $this->faker->phoneNumber,
            'prov_ruc' => $this->faker->unique()->numerify('###########'),
            'prov_direccion' => $this->faker->address(),
            'prov_localidad' => $this->faker->city(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
