<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'imagen', 'categorias_nombre_unico'];

    // Relación recursiva (categorías hijas)
    public function subcategorias()
    {
        return $this->hasMany(Categoria::class, 'categorias_nombre_unico', 'nombre_unico');
    }

    // Relación recursiva inversa (categoría padre)
    public function categoriaPadre()
    {
        return $this->belongsTo(Categoria::class, 'categorias_nombre_unico', 'nombre_unico');
    }

    // Relación muchos a muchos con Notas
    public function notas()
    {
        return $this->belongsToMany(Nota::class, 'notas_categorias', 'categorias_nombre_unico', 'notas_titulo_unico');
    }
}
