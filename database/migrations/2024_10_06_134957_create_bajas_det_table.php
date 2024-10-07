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
        Schema::create('bajas_det', function (Blueprint $table) {
            $table->increments('bdet_id');
            $table->integer('baja_id')->nullable();
            $table->integer('bien_id')->nullable();
            $table->integer('bdet_estado')->nullable()->index('bdet_estado_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bajas_det');
    }
};
