<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Nota;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with(['nota', 'usuario'])->get();
        return view('comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $notas = Nota::all();
        $usuarios = Usuario::all();
        return view('comentarios.create', compact('notas', 'usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'texto' => 'required|string|max:45',
            'notas_titulo_unico' => 'required|exists:notas,titulo_unico',
            'notas_programas_nombre_unico' => 'required|exists:programas,nombre_unico',
            'usuarios_email' => 'required|exists:usuarios,email',
        ]);

        Comentario::create($data);
        return redirect()->route('comentarios.index')->with('success', 'Comentario creado exitosamente.');
    }

    public function edit($id)
    {
        $comentario = Comentario::findOrFail($id);
        $notas = Nota::all();
        $usuarios = Usuario::all();
        return view('comentarios.edit', compact('comentario', 'notas', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);

        $data = $request->validate([
            'texto' => 'required|string|max:45',
            'notas_titulo_unico' => 'required|exists:notas,titulo_unico',
            'notas_programas_nombre_unico' => 'required|exists:programas,nombre_unico',
            'usuarios_email' => 'required|exists:usuarios,email',
        ]);

        $comentario->update($data);
        return redirect()->route('comentarios.index')->with('success', 'Comentario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return redirect()->route('comentarios.index')->with('success', 'Comentario eliminado exitosamente.');
    }
}
