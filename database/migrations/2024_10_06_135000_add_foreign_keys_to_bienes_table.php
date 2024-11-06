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
        Schema::table('bienes', function (Blueprint $table) {
            $table->foreign(['bsti_id'], 'fk_bienes_reference_bienes_t')->references(['bsti_id'])->on('bienes_sub_tipo')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['idet_id'], 'fk_bienes_reference_ingresos')->references(['idet_id'])->on('ingresos_det')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['sala_id'], 'fk_bienes_reference_salas')->references(['sala_id'])->on('salas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bienes', function (Blueprint $table) {
            $table->dropForeign('fk_bienes_reference_bien_s_t');
            $table->dropForeign('fk_bienes_reference_ingresos');
            $table->dropForeign('fk_bienes_reference_salas');
        });
    }
};
