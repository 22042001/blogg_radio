<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = ['contenido', 'imagen', 'resumen', 'programas_nombre_unico'];

    // Relación inversa con Programa
    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programas_nombre_unico', 'nombre_unico');
    }

    // Relación muchos a muchos con Categorias
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'notas_categorias', 'notas_titulo_unico', 'categorias_nombre_unico');
    }

    // Relación uno a muchos con Comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'notas_titulo_unico', 'titulo_unico');
    }
}