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
        Schema::create('actividades', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('actividad')->nullable();
            $table->string('descripcion')->nullable();
            $table->double('precio', 8, 2)->nullable();
            $table->time('duracion')->nullable();
            $table->foreignId('id_lugar_turistico')->references('id')->on('lugares_turisticos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades');
    }
};
