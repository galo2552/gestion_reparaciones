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
    Schema::create('reparaciones', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_cliente');
        $table->string('marca');
        $table->string('modelo');
        $table->text('descripcion_falla');
        $table->date('fecha_ingreso');
        $table->enum('estado', ['Ingresado', 'Reparando', 'Reparado', 'Entregado']);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparacions');
    }
};
