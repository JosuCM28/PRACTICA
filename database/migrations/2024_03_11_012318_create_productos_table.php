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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombre', 100);
            $table->string('descripcion');
            $table->double('precio');
            $table->date('expiracion');
            $table->integer('stock');
            $table->unsignedBigInteger('idProveedor'); // Cambiado a unsignedBigInteger
            $table->foreign('idProveedor')->references('idProveedor')->on('proveedores'); // Asegúrate de que la tabla proveedores exista
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
