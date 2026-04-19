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

            $table->foreignId('venta_id')->constrained('ventas')->cascadeOnDelete();
            $table->foreignId('instalacion_id')->constrained('instalaciones')->cascadeOnDelete();
            $table->foreignId('especie_id')->constrained('especies')->cascadeOnDelete();
            $table->string('calibre')->nullable();
            $table->string('frescura')->nullable();
            $table->foreignId('vendedor_id')->constrained('vendedores')->cascadeOnDelete();
            $table->foreignId('comprador_id')->constrained('compradores')->cascadeOnDelete();
            $table->string('lote');
            $table->decimal('cantidad', 10, 2);

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
