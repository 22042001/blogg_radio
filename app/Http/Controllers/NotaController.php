<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Programa;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::with('programa')->get();
        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('notas.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'contenido' => 'required|string|max:45',
            'imagen' => 'nullable|string|max:45',
            'resumen' => 'required|string|max:45',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        Nota::create($data);
        return redirect()->route('notas.index')->with('success', 'Nota creada exitosamente.');
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $programas = Programa::all();
        return view('notas.edit', compact('nota', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);

        $data = $request->validate([
            'contenido' => 'required|string|max:45',
            'imagen' => 'nullable|string|max:45',
            'resumen' => 'required|string|max:45',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        $nota->update($data);
        return redirect()->route('notas.index')->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();
        return redirect()->route('notas.index')->with('success', 'Nota eliminada exitosamente.');
    }
}
