@extends('layouts.app')

@section('title', 'Comentarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Comentarios</h1>
        <a href="{{ route('comentarios.create') }}" class="btn btn-primary">Crear Comentario</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Texto</th>
                <th>Nota</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->texto }}</td>
                    <td>{{ $comentario->nota->titulo_unico }}</td>
                    <td>{{ $comentario->usuario->email }}</td>
                    <td>
                        <a href="{{ route('comentarios.edit', $comentario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este comentario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection