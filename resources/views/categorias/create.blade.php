@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <h1>Crear Categoría</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_unico" class="form-label">Nombre</label>
            <input type="text" name="nombre_unico" id="nombre_unico" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" name="imagen" id="imagen" class="form-control">
        </div>
        <div class="mb-3">
            <label for="categorias_nombre_unico" class="form-label">Categoría Padre</label>
            <select name="categorias_nombre_unico" id="categorias_nombre_unico" class="form-control">
                <option value="">Ninguna</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->nombre_unico }}">{{ $categoria->nombre_unico }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection