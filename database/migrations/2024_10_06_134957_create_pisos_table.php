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
        Schema::create('pisos', function (Blueprint $table) {
            $table->increments('piso_id');
            $table->integer('edif_id')->nullable();
            $table->string('piso_descripcion');
            $table->string('piso_direccion')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['edif_id', 'piso_descripcion'], 'pis_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pisos');
    }
};
