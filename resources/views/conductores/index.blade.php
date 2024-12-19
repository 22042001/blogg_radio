@extends('layouts.app')

@section('title', 'Conductores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Conductores</h1>
        <a href="{{ route('conductores.create') }}" class="btn btn-primary">Crear Conductor</a>
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
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conductores as $conductor)
                <tr>
                    <td>{{ $conductor->nombre }}</td>
                    <td>{{ $conductor->programa->nombre_unico }}</td>
                    <td>
                        <a href="{{ route('conductores.edit', $conductor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('conductores.destroy', $conductor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este conductor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection