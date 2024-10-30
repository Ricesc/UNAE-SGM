<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Importa tus seeders aquí
use Database\Seeders\BajaSeeder;
use Database\Seeders\BajasDetSeeder;
use Database\Seeders\BienesSubTipoSeeder;
use Database\Seeders\BienesTipoSeeder;
use Database\Seeders\BienSeeder;
use Database\Seeders\DependenciaSeeder;
use Database\Seeders\EdificioSeeder;
use Database\Seeders\IngresoSeeder;
use Database\Seeders\IngresosDetSeeder;
use Database\Seeders\PisoSeeder;
use Database\Seeders\ProveedorSeeder;
use Database\Seeders\SalaSeeder;
use Database\Seeders\SalasTipoSeeder;
use Database\Seeders\SectorSeeder;
use Database\Seeders\TranferDetalleSeeder;
use Database\Seeders\TransferenciaSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Llama a los seeders
        $this->call([
            BajaSeeder::class,
            BajasDetSeeder::class,
            BienesSubTipoSeeder::class,
            BienesTipoSeeder::class,
            BienSeeder::class,
            DependenciaSeeder::class,
            EdificioSeeder::class,
            IngresoSeeder::class,
            IngresosDetSeeder::class,
            PisoSeeder::class,
            ProveedorSeeder::class,
            SalaSeeder::class,
            SalasTipoSeeder::class,
            SectorSeeder::class,
            TranferDetalleSeeder::class,
            TransferenciaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
