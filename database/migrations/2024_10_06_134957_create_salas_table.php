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
            
            // Agregar claves foráneas
            $table->foreign('sect_id')->references('sect_id')->on('sectores')
                  ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('stip_id')->references('stip_id')->on('salas_tipo')
                  ->onDelete('set null')->onUpdate('cascade');
            $table->foreign('depe_id')->references('depe_id')->on('dependencias')
                  ->onDelete('set null')->onUpdate('cascade');
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
