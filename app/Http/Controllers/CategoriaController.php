<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('subcategorias')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $categoriasPadre = Categoria::all();
        return view('categorias.create', compact('categoriasPadre'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descripcion' => 'required|string|max:45',
            'imagen' => 'nullable|string|max:45',
            'categorias_nombre_unico' => 'nullable|exists:categorias,nombre_unico',
        ]);

        Categoria::create($data);
        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoriasPadre = Categoria::all();
        return view('categorias.edit', compact('categoria', 'categoriasPadre'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $data = $request->validate([
            'descripcion' => 'required|string|max:45',
            'imagen' => 'nullable|string|max:45',
            'categorias_nombre_unico' => 'nullable|exists:categorias,nombre_unico',
        ]);

        $categoria->update($data);
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
