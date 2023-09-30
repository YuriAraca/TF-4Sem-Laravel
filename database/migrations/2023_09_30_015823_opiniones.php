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
        Schema::create('opiniones', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('usuario')->nullable();
            $table->text('opinion')->nullable();
            $table->enum('calificacion', [0, 1, 2, 3, 4, 5])->default(0);
            $table->foreignId('id_actividad')->references('id')->on('actividades')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opiniones');
    }
};
