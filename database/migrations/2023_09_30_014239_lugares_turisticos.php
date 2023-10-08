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
        Schema::create('lugares_turisticos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->double('precio_entrada', 8, 2)->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->string('ruta_imagen')->nullable();
            $table->foreignId('id_ciudad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares_turisticos');
    }
};
