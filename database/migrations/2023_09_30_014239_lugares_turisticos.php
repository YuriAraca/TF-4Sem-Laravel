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
            $table->string('descripcion')->nullable();
            $table->double('precio_entrada', 8, 2)->default(0);
            $table->dateTime('horario')->nullable();
            $table->binary('imagen')->nullable();
            $table->foreignId('id_ciudad')->references('id')->on('ciudades')->nullable();
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
