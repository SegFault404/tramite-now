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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_tramite', ['tarjeta_circulacion_carga_descarga', 'tarjeta_circulacion_mototaxi', 'tarjeta_circulacion_automoviles']); // Puede ser un ENUM en vez de string si lo prefieres
            $table->string('idvehicular_path');
            $table->string('licencia_path');
            $table->string('soat_path');
            $table->string('certificacion_path');
            $table->enum('status', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); // Agregar campo de estado

            // Relación con la tabla users (no nullable)
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
