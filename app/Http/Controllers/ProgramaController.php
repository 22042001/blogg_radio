<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::with(['horarios', 'conductores', 'notas'])->get();
        return view('programas.index', compact('programas'));
    }

    public function show($id)
    {
        $programa = Programa::with(['horarios', 'conductores', 'notas'])->findOrFail($id);
        return view('programas.show', compact('programa'));
    }

    public function create()
    {
        return view('programas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_unico' => 'required|string|max:45|unique:programas',
            'descripcion' => 'required|string|max:45',
        ]);

        Programa::create($data);
        return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }

    public function edit($id)
    {
        $programa = Programa::findOrFail($id);
        return view('programas.edit', compact('programa'));
    }

    public function update(Request $request, $id)
    {
        $programa = Programa::findOrFail($id);

        $data = $request->validate([
            'descripcion' => 'required|string|max:45',
        ]);

        $programa->update($data);
        return redirect()->route('programas.index')->with('success', 'Programa actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $programa = Programa::findOrFail($id);
        $programa->delete();
        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }
}
