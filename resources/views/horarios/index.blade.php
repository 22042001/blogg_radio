@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Horarios</h1>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">Crear Horario</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $horario)
                <tr>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ $horario->programa->nombre_unico }}</td>
                    <td>
                        <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este horario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection