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
            'bsti_descripcion' => $this->faker->word,
        'bsti_detalle' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
