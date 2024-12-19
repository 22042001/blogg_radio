@extends('layouts.app')

@section('title', 'Crear Nota')

@section('content')
    <h1>Crear Nota</h1>

    <form action="{{ route('notas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo_unico" class="form-label">Título</label>
            <input type="text" name="titulo_unico" id="titulo_unico" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" id="contenido" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="resumen" class="form-label">Resumen</label>
            <textarea name="resumen" id="resumen" class="form-control" required></textarea>
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
        <a href="{{ route('notas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection