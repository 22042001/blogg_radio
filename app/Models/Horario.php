<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['hora_inicio', 'hora_fin', 'programas_nombre_unico'];

    // Relación inversa con Programa
    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programas_nombre_unico', 'nombre_unico');
    }
}
