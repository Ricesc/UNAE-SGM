<?php

namespace Database\Seeders;

use App\Models\Bien;
use Illuminate\Database\Seeder;

class BienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bien::factory()->count(50)->create();
    }
}
