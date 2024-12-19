<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('notas_categorias', function (Blueprint $table) {
            $table->string('nota_id');
            $table->string('categoria_id');
            $table->foreign('nota_id')->references('titulo_unico')->on('notas')->onDelete('cascade');
            $table->foreign('categoria_id')->references('nombre_unico')->on('categorias')->onDelete('cascade');
            $table->primary(['nota_id', 'categoria_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('notas_categorias');
    }
}

