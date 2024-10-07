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
        Schema::create('ingresos_det', function (Blueprint $table) {
            $table->increments('idet_id');
            $table->integer('ing_id')->nullable();
            $table->integer('btip_id')->nullable();
            $table->integer('idet_cantidad')->nullable();
            $table->integer('idet_estado')->nullable()->index('indt_est_idx');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['ing_id', 'btip_id'], 'infrt_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos_det');
    }
};
