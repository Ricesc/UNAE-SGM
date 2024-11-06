<?php

namespace Database\Seeders;

use App\Models\SalasTipo;
use Illuminate\Database\Seeder;

class SalasTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalasTipo::factory()->count(3)->create();
    }
}
