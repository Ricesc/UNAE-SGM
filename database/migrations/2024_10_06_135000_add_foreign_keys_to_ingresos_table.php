<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->foreign(['prov_id'], 'fk_ingresos_reference_proveedo')->references(['prov_id'])->on('proveedores')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usu_id'], 'fk_ingresos_reference_usuarios')->references(['usu_id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingresos', function (Blueprint $table) {
            $table->dropForeign('fk_ingresos_reference_proveedo');
            $table->dropForeign('fk_ingresos_reference_usuarios');
        });
    }
};
