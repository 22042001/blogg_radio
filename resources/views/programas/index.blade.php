@extends('layouts.app')

@section('title', 'Programas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Programas</h1>
        <a href="{{ route('programas.create') }}" class="btn btn-primary">Crear Programa</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre Único</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programas as $programa)
                <tr>
                    <td>{{ $programa->nombre_unico }}</td>
                    <td>{{ $programa->descripcion }}</td>
                    <td>
                        <a href="{{ route('programas.show', $programa->nombre_unico) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('programas.edit', $programa->nombre_unico) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('programas.destroy', $programa->nombre_unico) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este programa?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection