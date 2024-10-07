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
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('ing_id');
            $table->integer('prov_id')->nullable();
            $table->integer('usu_id')->nullable();
            $table->date('ing_fecha_compra')->nullable()->index('ingre_fcomp_idx');
            $table->integer('ing_costo_total')->nullable();
            $table->integer('ing_estado')->nullable()->default(0)->index('ingre_estado_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
