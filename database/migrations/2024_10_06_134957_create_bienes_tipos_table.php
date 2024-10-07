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
        Schema::create('bienes_tipos', function (Blueprint $table) {
            $table->increments('btip_id');
            $table->integer('bsti_id')->nullable();
            $table->string('btip_descripcion')->index('btip_desc_idx');
            $table->text('btip_detalle')->nullable();
            $table->integer('btip_costo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes_tipos');
    }
};
