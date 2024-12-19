<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->string('nota_id');
            $table->string('usuario_email');
            $table->foreign('nota_id')->references('titulo_unico')->on('notas')->onDelete('cascade');
            $table->foreign('usuario_email')->references('email')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}

