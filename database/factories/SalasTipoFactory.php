<?php

namespace Database\Factories;

use App\Models\SalasTipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalasTipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalasTipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'stip_descripcion' => $this->faker->word(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
