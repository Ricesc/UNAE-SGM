<?php

namespace Database\Factories;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bsti_id' => \App\Models\BienesSubTipo::factory(),
            'sala_id' => \App\Models\Sala::factory(),
            'idet_id' => \App\Models\IngresosDet::factory(),
            'bien_estado' => $this->faker->numberBetween(0, 1),
            'bien_codigo' => strtoupper($this->faker->lexify('????????????')) . $this->faker->numerify('##############'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
