@extends('layouts.app')

@section('title', 'Editar Horario')

@section('content')
    <h1>Editar Horario</h1>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ $horario->hora_inicio }}" required>
        </div>
        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ $horario->hora_fin }}" required>
        </div>
        <div class="mb-3">
            <label for="programas_nombre_unico" class="form-label">Programa</label>
            <select name="programas_nombre_unico" id="programas_nombre_unico" class="form-control" required>
                @foreach ($programas as $programa)
                    <option value="{{ $programa->nombre_unico }}" {{ $horario->programas_nombre_unico == $programa->nombre_unico ? 'selected' : '' }}>
                        {{ $programa->nombre_unico }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection