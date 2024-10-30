<?php

namespace Database\Seeders;

use App\Models\BajasDet;
use Illuminate\Database\Seeder;

class BajasDetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BajasDet::factory()->count(50)->create();
    }
}
