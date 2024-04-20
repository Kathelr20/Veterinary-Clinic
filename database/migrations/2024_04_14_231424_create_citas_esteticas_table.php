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
        Schema::create('citas_esteticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('personal_id'); 
            $table->unsignedBigInteger('tipo_estetica_id');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('valor', 8, 2);
            $table->timestamps();

            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreign('personal_id')->references('id')->on('personals')->onDelete('cascade');
            $table->foreign('tipo_estetica_id')->references('id')->on('tipo_esteticas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas_esteticas');
    }
};
