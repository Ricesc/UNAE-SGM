<?php

namespace Database\Seeders;

use App\Models\BienesTipo;
use Illuminate\Database\Seeder;

class BienesTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BienesTipo::factory()->count(5)->create();
    }
}
