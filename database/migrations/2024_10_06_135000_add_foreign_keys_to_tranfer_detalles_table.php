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
        Schema::table('tranfer_detalles', function (Blueprint $table) {
            $table->foreign(['bien_id'], 'fk_tranfer__reference_bienes')->references(['bien_id'])->on('bienes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['tran_id'], 'fk_tranfer__reference_transfer')->references(['tran_id'])->on('transferencias')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tranfer_detalles', function (Blueprint $table) {
            $table->dropForeign('fk_tranfer__reference_bienes');
            $table->dropForeign('fk_tranfer__reference_transfer');
        });
    }
};
