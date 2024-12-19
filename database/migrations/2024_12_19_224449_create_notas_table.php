<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->string('titulo_unico')->primary();
            $table->text('contenido');
            $table->string('imagen')->nullable();
            $table->text('resumen');
            $table->string('programa_id');
            $table->foreign('programa_id')->references('nombre_unico')->on('programas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas');
    }
}

