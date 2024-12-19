<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'conductores';

    // Si tienes una clave primaria personalizada, puedes especificarla aquí
    protected $primaryKey = 'id';

    // Si no usas timestamps (created_at, updated_at), desactívalos
    public $timestamps = false;

    // Relación con la tabla programas
    public function programa()
    {
        return $this->belongsTo(Programa::class, 'programas_nombre_unico', 'nombre_unico');
    }
}
