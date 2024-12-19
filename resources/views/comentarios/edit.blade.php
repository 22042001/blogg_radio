@extends('layouts.app')

@section('title', 'Editar Comentario')

@section('content')
    <h1>Editar Comentario</h1>

    <form action="{{ route('comentarios.update', $comentario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="texto" class="form-label">Texto</label>
            <textarea name="texto" id="texto" class="form-control" required>{{ $comentario->texto }}</textarea>
        </div>
        <div class="mb-3">
            <label for="notas_titulo_unico" class="form-label">Nota</label>
            <select name="notas_titulo_unico" id="notas_titulo_unico" class="form-control" required>
                @foreach ($notas as $nota)
                    <option value="{{ $nota->titulo_unico }}" {{ $comentario->notas_titulo_unico == $nota->titulo_unico ? 'selected' : '' }}>
                        {{ $nota->titulo_unico }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="usuarios_email" class="form-label">Usuario</label>
            <select name="usuarios_email" id="usuarios_email" class="form-control" required>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->email }}" {{ $comentario->usuarios_email == $usuario->email ? 'selected' : '' }}>
                        {{ $usuario->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('comentarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection