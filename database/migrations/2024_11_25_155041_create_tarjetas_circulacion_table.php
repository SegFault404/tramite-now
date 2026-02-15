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
        Schema::create('tarjetas_circulacion', function (Blueprint $table) {
            $table->id();
            $table->string('empresa_asociacion');
            $table->string('razon_social');
            $table->string('vehiculo');
            $table->string('placa');
            $table->string('color');
            $table->string('marca');
            $table->string('chasis');
            $table->string('tipo_servicio');
            $table->string('numero_motor');
            $table->date('fecha_expedicion');
            $table->date('fecha_vencimiento');

            // Llave foránea para relacionar con trámites
            $table->foreignId('tramite_id')->constrained('tramites');
            
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjetas_circulacion');
    }
};
