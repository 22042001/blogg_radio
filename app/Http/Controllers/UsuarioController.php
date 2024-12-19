<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:45|unique:usuarios',
            'fecha_registro' => 'required|date',
            'username' => 'required|string|max:45',
            'password' => 'required|string|max:45',
            'avatar' => 'nullable|string|max:45',
        ]);

        Usuario::create($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $data = $request->validate([
            'fecha_registro' => 'required|date',
            'username' => 'required|string|max:45',
            'password' => 'required|string|max:45',
            'avatar' => 'nullable|string|max:45',
        ]);

        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}