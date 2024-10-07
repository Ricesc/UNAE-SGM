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
        Schema::table('transferencias', function (Blueprint $table) {
            $table->foreign(['sala_id'], 'fk_transfer_reference_salas')->references(['sala_id'])->on('salas')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usu_id'], 'fk_transfer_reference_usuarios')->references(['usu_id'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transferencias', function (Blueprint $table) {
            $table->dropForeign('fk_transfer_reference_salas');
            $table->dropForeign('fk_transfer_reference_usuarios');
        });
    }
};
