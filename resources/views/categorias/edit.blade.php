@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <h1>Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->nombre_unico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $categoria->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" name="imagen" id="imagen" class="form-control" value="{{ $categoria->imagen }}">
        </div>
        <div class="mb-3">
            <label for="categorias_nombre_unico" class="form-label">Categoría Padre</label>
            <select name="categorias_nombre_unico" id="categorias_nombre_unico" class="form-control">
                <option value="">Ninguna</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->nombre_unico }}" {{ $categoria->categorias_nombre_unico == $cat->nombre_unico ? 'selected' : '' }}>
                        {{ $cat->nombre_unico }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection