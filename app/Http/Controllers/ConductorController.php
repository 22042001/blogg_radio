<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Programa;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function index()
    {
        $conductores = Conductor::with('programa')->get();
        return view('conductores.index', compact('conductores'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('conductores.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:45',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        Conductor::create($data);
        return redirect()->route('conductores.index')->with('success', 'Conductor creado exitosamente.');
    }

    public function edit($id)
    {
        $conductor = Conductor::findOrFail($id);
        $programas = Programa::all();
        return view('conductores.edit', compact('conductor', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'required|string|max:45',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        $conductor->update($data);
        return redirect()->route('conductores.index')->with('success', 'Conductor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $conductor = Conductor::findOrFail($id);
        $conductor->delete();
        return redirect()->route('conductores.index')->with('success', 'Conductor eliminado exitosamente.');
    }
}
