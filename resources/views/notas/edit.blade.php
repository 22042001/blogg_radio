@extends('layouts.app')

@section('title', 'Editar Nota')

@section('content')
    <h1>Editar Nota</h1>

    <form action="{{ route('notas.update', $nota->titulo_unico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" id="contenido" class="form-control" required>{{ $nota->contenido }}</textarea>
        </div>
        <div class="mb-3">
            <label for="resumen" class="form-label">Resumen</label>
            <textarea name="resumen" id="resumen" class="form-control" required>{{ $nota->resumen }}</textarea>
        </div>
        <div class="mb-3">
            <label for="programas_nombre_unico" class="form-label">Programa</label>
            <select name="programas_nombre_unico" id="programas_nombre_unico" class="form-control" required>
                @foreach ($programas as $programa)
                    <option value="{{ $programa->nombre_unico }}" {{ $nota->programas_nombre_unico == $programa->nombre_unico ? 'selected' : '' }}>
                        {{ $programa->nombre_unico }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('notas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection