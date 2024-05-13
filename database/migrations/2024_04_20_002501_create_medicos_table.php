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
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datos_id')->constrained('datos_personales')->onDelete('cascade');;
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');;
            $table->boolean('activo');
            $table->foreignId('especialidad_id')->constrained('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};
