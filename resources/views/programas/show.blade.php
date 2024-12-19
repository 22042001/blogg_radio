@extends('layouts.app')

@section('title', 'Detalle del Programa')

@section('content')
    <h1>Detalle del Programa</h1>

    <p><strong>Nombre Único:</strong> {{ $programa->nombre_unico }}</p>
    <p><strong>Descripción:</strong> {{ $programa->descripcion }}</p>

    <a href="{{ route('programas.index') }}" class="btn btn-secondary">Volver</a>
@endsection