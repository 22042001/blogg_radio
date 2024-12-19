@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
    <h1>Editar Usuario</h1>

    <form action="{{ route('usuarios.update', $usuario->email) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{ $usuario->username }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar (URL)</label>
            <input type="text" name="avatar" id="avatar" class="form-control" value="{{ $usuario->avatar }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection