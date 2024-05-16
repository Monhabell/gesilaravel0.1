<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
         // Tabla entornos
         Schema::create('entornos', function (Blueprint $table) {
            $table->id();
            $table->string('entorno')->unique();
        });

        // Tabla 'bases'
        Schema::create('bases', function (Blueprint $table) {
            $table->id();       
            $table->string('nombrebase');
            $table->integer('tiempoencabezado');
            $table->integer('tiempoindseg');
            $table->unsignedBigInteger('entorno_id'); // Clave foránea
            $table->foreign('entorno_id')->references('id')->on('entornos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bases');
        Schema::dropIfExists('entornos');              
    }
};

