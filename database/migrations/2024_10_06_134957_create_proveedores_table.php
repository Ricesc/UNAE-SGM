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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->increments('prov_id');
            $table->string('prov_nombre')->index('prov_nom_idx');
            $table->integer('prov_telefono')->nullable();
            $table->string('prov_ruc')->nullable()->unique('prov_ruc_idx');
            $table->text('prov_direccion')->nullable();
            $table->string('prov_localidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
