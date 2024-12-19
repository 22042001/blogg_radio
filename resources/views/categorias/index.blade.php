@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Categoría Padre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->nombre_unico }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->imagen }}</td>
                    <td>{{ $categoria->categoriaPadre->nombre_unico ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->nombre_unico) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categorias.destroy', $categoria->nombre_unico) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection