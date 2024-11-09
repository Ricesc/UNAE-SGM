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
            $table->unsignedInteger('ing_id')->nullable(); // Cambiado a unsignedInteger
            $table->unsignedInteger('bsti_id')->nullable(); // Cambiado a unsignedInteger
            $table->integer('idet_cantidad')->nullable();
            $table->integer('idet_estado')->nullable()->index('indt_est_idx');
            $table->timestamps();
            $table->softDeletes();

            // Crear clave única en el par de columnas ing_id y bsti_id
            $table->unique(['ing_id', 'bsti_id'], 'indt_idx');

            // Agregar claves foráneas
            $table->foreign('ing_id')
                ->references('ing_id')->on('ingresos')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('bsti_id')
                ->references('bsti_id')->on('bienes_sub_tipo')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
