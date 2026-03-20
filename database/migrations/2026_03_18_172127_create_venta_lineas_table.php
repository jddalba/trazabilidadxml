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
        Schema::create('venta_lineas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');

            $table->foreignId('especie_id')->constrained('especies');

            $table->string('lote');
            $table->date('fecha_venta');
            $table->decimal('cantidad', 10, 2);

            $table->foreignId('vendedor_id')->constrained('vendedores');
            $table->foreignId('comprador_id')->constrained('compradores');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_lineas');
    }
};
