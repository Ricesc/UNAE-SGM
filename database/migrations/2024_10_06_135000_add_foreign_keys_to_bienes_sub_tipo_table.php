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
        Schema::table('bienes_sub_tipo', function (Blueprint $table) {
            $table->foreign(['btip_id'], 'fk_bien_s_t_reference_bien_t')->references(['btip_id'])->on('bienes_tipos')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bienes_sub_tipo', function (Blueprint $table) {
            $table->dropForeign('fk_bien_s_t_reference_bien_t');
        });
    }
};
