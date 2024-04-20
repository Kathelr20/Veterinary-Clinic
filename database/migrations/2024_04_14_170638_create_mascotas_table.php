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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion')->unique();
            $table->unsignedBigInteger('tipo_mascota_id');
            $table->foreign('tipo_mascota_id')->references('id')->on('tipo_mascotas')->onDelete('cascade');
            $table->unsignedBigInteger('raza_id');
            $table->foreign('raza_id')->references('id')->on('razas')->onDelete('cascade');
            $table->string('nombre');
            $table->integer('años');
            $table->string('foto')->nullable();
            $table->string('dueño');
            $table->string('tel');
            $table->string('correo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
