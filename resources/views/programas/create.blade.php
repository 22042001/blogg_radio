@extends('layouts.app')

@section('title', 'Crear Programa')

@section('content')
    <h1>Crear Programa</h1>

    <form action="{{ route('programas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_unico" class="form-label">Nombre Único</label>
            <input type="text" name="nombre_unico" id="nombre_unico" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('programas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection