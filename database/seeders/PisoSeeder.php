<?php

namespace Database\Seeders;

use App\Models\Piso;
use Illuminate\Database\Seeder;

class PisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Piso::factory()->count(50)->create();
    }
}
