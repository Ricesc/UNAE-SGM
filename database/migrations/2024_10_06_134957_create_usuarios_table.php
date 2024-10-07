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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->string('usu_nombre');
            $table->string('usu_apellido');
            $table->integer('usu_rol')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['usu_nombre', 'usu_apellido'], 'usu_nombre_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
