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
        Schema::create('especies', function (Blueprint $table) {

            $table->id();
            $table->string('codigo')->unique(); // código interno
            $table->string('especie_comercial');
            $table->string('especie_cientifica');
            $table->string('especie_al3');
            $table->string('pais_al3');
            $table->string('metodo_produccion');
            $table->string('cod_conservacion');
            $table->string('cod_presentacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especies');
    }
};
