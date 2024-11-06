<?php

namespace Database\Seeders;

use App\Models\BienesSubTipo;
use Illuminate\Database\Seeder;

class BienesSubTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BienesSubTipo::factory()->count(10)->create();
    }
}
