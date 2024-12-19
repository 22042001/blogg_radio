<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'notas_titulo_unico', 'notas_programas_nombre_unico', 'usuarios_email'];

    // Relación inversa con Nota
    public function nota()
    {
        return $this->belongsTo(Nota::class, 'notas_titulo_unico', 'titulo_unico');
    }

    // Relación inversa con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_email', 'email');
    }
}
