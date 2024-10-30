<?php

namespace Database\Seeders;

use App\Models\Edificio;
use Illuminate\Database\Seeder;

class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edificio::factory()->count(50)->create();
    }
}
