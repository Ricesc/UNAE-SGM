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
        Schema::create('tranfer_detalles', function (Blueprint $table) {
            $table->increments('trdet_id');
            $table->integer('tran_id')->nullable();
            $table->integer('bien_id')->nullable();
            $table->integer('trdet_estado')->index('trdet_estado_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranfer_detalles');
    }
};
