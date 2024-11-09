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
            $table->unsignedInteger('btip_id')->nullable(); // Cambiado a unsignedInteger
            $table->string('bsti_descripcion')->index('bsti_desc_idx');
            $table->text('bsti_detalle')->nullable();
            $table->integer('bsti_costo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Definir la clave foránea
            $table->foreign('btip_id')
                ->references('btip_id')
                ->on('bienes_tipos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
