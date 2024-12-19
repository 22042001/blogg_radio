@extends('layouts.app')

@section('title', 'Editar Programa')

@section('content')
    <h1>Editar Programa</h1>

    <form action="{{ route('programas.update', $programa->nombre_unico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $programa->descripcion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('programas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection