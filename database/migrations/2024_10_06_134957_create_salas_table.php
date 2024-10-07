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
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('sala_id');
            $table->integer('sect_id')->nullable();
            $table->integer('stip_id')->nullable();
            $table->integer('depe_id')->nullable();
            $table->string('sala_descripcion')->index('sala_desc_idx');
            $table->string('sala_direccion')->nullable();
            $table->integer('sala_capacidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
