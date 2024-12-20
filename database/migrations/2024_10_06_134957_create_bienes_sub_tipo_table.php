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
        Schema::create('bienes_sub_tipo', function (Blueprint $table) {
            $table->increments('bsti_id');
            $table->integer('btip_id')->nullable();
            $table->string('bsti_descripcion')->index('bsti_desc_idx');
            $table->text('bsti_detalle')->nullable();
            $table->integer('bsti_costo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienes_sub_tipo');
    }
};
