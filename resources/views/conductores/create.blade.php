@extends('layouts.app')

@section('title', 'Crear Conductor')

@section('content')
    <h1>Crear Conductor</h1>

    <form action="{{ route('conductores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="programas_nombre_unico" class="form-label">Programa</label>
            <select name="programas_nombre_unico" id="programas_nombre_unico" class="form-control" required>
                @foreach ($programas as $programa)
                    <option value="{{ $programa->nombre_unico }}">{{ $programa->nombre_unico }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('conductores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection