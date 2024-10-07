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
        Schema::table('salas', function (Blueprint $table) {
            $table->foreign(['depe_id'], 'fk_salas_reference_dependen')->references(['depe_id'])->on('dependencias')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['stip_id'], 'fk_salas_reference_salas_ti')->references(['stip_id'])->on('salas_tipo')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['sect_id'], 'fk_salas_reference_sectores')->references(['sect_id'])->on('sectores')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salas', function (Blueprint $table) {
            $table->dropForeign('fk_salas_reference_dependen');
            $table->dropForeign('fk_salas_reference_salas_ti');
            $table->dropForeign('fk_salas_reference_sectores');
        });
    }
};
