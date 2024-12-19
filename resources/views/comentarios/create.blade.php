@extends('layouts.app')

@section('title', 'Crear Comentario')

@section('content')
    <h1>Crear Comentario</h1>

    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea name="texto" id="texto" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="notas_titulo_unico" class="form-label">Nota</label>
            <select name="notas_titulo_unico" id="notas_titulo_unico" class="form-control" required>
                @foreach ($notas as $nota)
                    <option value="{{ $nota->titulo_unico }}">{{ $nota->titulo_unico }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuarios_email" class="form-label">Usuario</label>
            <select name="usuarios_email" id="usuarios_email" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->email }}">{{ $usuario->email }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('comentarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection