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
        Schema::table('bienes_tipos', function (Blueprint $table) {
            $table->foreign(['bsti_id'], 'fk_bienes_t_reference_bienes_s')->references(['bsti_id'])->on('bienes_sub_tipo')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bienes_tipos', function (Blueprint $table) {
            $table->dropForeign('fk_bienes_t_reference_bienes_s');
        });
    }
};
