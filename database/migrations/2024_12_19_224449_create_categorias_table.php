<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->string('nombre_unico')->primary();
            $table->string('descripcion');
            $table->string('imagen')->nullable();
            $table->string('categoria_padre_id')->nullable();
            $table->timestamps();
        });

        // Agregar la clave foránea después de la creación de la tabla
        Schema::table('categorias', function (Blueprint $table) {
            $table->foreign('categoria_padre_id')
                ->references('nombre_unico')
                ->on('categorias')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('categorias', function (Blueprint $table) {
            $table->dropForeign(['categoria_padre_id']);
        });

        Schema::dropIfExists('categorias');
    }
}

