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
        Schema::create('bienes', function (Blueprint $table) {
            $table->increments('bien_id');
            $table->integer('btip_id')->nullable();
            $table->integer('sala_id')->nullable();
            $table->integer('idet_id')->nullable();
            $table->integer('bien_estado')->nullable();
            $table->string('bien_codigo', 30)->nullable()->unique('bi_cod_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes');
    }
};
