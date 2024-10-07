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
        Schema::table('bajas_det', function (Blueprint $table) {
            $table->foreign(['baja_id'], 'fk_bajas_de_reference_bajas')->references(['baja_id'])->on('bajas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['bien_id'], 'fk_bajas_de_reference_bienes')->references(['bien_id'])->on('bienes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bajas_det', function (Blueprint $table) {
            $table->dropForeign('fk_bajas_de_reference_bajas');
            $table->dropForeign('fk_bajas_de_reference_bienes');
        });
    }
};
