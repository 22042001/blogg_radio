<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'email'; // Clave primaria personalizada
    public $incrementing = false; // Desactiva el autoincremento
    protected $keyType = 'string'; // Tipo de clave primaria

    protected $fillable = ['email', 'fecha_registro', 'username', 'password', 'avatar'];

    // Relación uno a muchos con Comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'usuarios_email', 'email');
    }
}