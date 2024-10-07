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
        Schema::table('ingresos_det', function (Blueprint $table) {
            $table->foreign(['btip_id'], 'fk_ingresos_reference_bienes_t')->references(['btip_id'])->on('bienes_tipos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['ing_id'], 'fk_ingresos_reference_ingresos')->references(['ing_id'])->on('ingresos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingresos_det', function (Blueprint $table) {
            $table->dropForeign('fk_ingresos_reference_bienes_t');
            $table->dropForeign('fk_ingresos_reference_ingresos');
        });
    }
};
