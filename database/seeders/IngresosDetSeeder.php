<?php

namespace Database\Seeders;

use App\Models\IngresosDet;
use Illuminate\Database\Seeder;

class IngresosDetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IngresosDet::factory()->count(50)->create();
    }
}
