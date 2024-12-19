<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Programa;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('programa')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $programas = Programa::all();
        return view('horarios.create', compact('programas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        Horario::create($data);
        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente.');
    }

    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $programas = Programa::all();
        return view('horarios.edit', compact('horario', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);

        $data = $request->validate([
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'programas_nombre_unico' => 'required|exists:programas,nombre_unico',
        ]);

        $horario->update($data);
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente.');
    }
}
