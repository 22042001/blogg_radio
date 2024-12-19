<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nombre_unico'; // Clave primaria personalizada
    public $incrementing = false; // Desactiva el autoincremento
    protected $keyType = 'string'; // Tipo de clave primaria

    protected $fillable = ['nombre_unico', 'descripcion'];

    // Relación uno a muchos con Horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'programas_nombre_unico', 'nombre_unico');
    }

    // Relación uno a muchos con Conductores
    public function conductores()
    {
        return $this->hasMany(Conductor::class, 'programas_nombre_unico', 'nombre_unico');
    }

    // Relación uno a muchos con Notas
    public function notas()
    {
        return $this->hasMany(Nota::class, 'programas_nombre_unico', 'nombre_unico');
    }
}
