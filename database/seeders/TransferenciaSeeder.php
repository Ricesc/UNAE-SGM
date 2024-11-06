<?php

namespace Database\Seeders;

use App\Models\Transferencia;
use Illuminate\Database\Seeder;

class TransferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transferencia::factory()->count(10)->create();
    }
}
