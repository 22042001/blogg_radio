@extends('layouts.app')

@section('title', 'Notas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Notas</h1>
        <a href="{{ route('notas.create') }}" class="btn btn-primary">Crear Nota</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Contenido</th>
                <th>Resumen</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{ $nota->titulo_unico }}</td>
                    <td>{{ $nota->contenido }}</td>
                    <td>{{ $nota->resumen }}</td>
                    <td>{{ $nota->programa->nombre_unico }}</td>
                    <td>
                        <a href="{{ route('notas.edit', $nota->titulo_unico) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('notas.destroy', $nota->titulo_unico) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta nota?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection