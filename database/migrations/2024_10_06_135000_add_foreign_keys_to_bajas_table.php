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
        Schema::table('bajas', function (Blueprint $table) {
            $table->foreign(['usu_id'], 'fk_bajas_reference_usuarios')->references(['usu_id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bajas', function (Blueprint $table) {
            $table->dropForeign('fk_bajas_reference_usuarios');
        });
    }
};
