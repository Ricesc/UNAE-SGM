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
        Schema::table('pisos', function (Blueprint $table) {
            $table->foreign(['edif_id'], 'fk_pisos_reference_edificio')->references(['edif_id'])->on('edificios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pisos', function (Blueprint $table) {
            $table->dropForeign('fk_pisos_reference_edificio');
        });
    }
};
