<?php

namespace Database\Seeders;

use App\Models\TranferDetalle;
use Illuminate\Database\Seeder;

class TranferDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TranferDetalle::factory()->count(50)->create();
    }
}
