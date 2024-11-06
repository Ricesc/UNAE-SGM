<?php

namespace Database\Seeders;

use App\Models\Baja;
use Illuminate\Database\Seeder;


class BajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Baja::factory()->count(10)->create();
    }
}
