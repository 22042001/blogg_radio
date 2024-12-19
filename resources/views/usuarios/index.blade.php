@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Usuarios</h1>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Crear Usuario</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Email</th>
                <th>Fecha de Registro</th>
                <th>Username</th>
                <th>Avatar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->fecha_registro }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td><img src="{{ $usuario->avatar }}" alt="Avatar" width="50"></td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->email) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->email) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection