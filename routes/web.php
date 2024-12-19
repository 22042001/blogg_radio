<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComentarioController;

// Ruta de inicio (opcional)
Route::get('/', function () {
    return view('welcome'); // Cambia 'welcome' por la vista que desees mostrar como página principal
});

// Rutas para Programas
Route::resource('programas', ProgramaController::class);

// Rutas para Horarios
Route::resource('horarios', HorarioController::class);

// Rutas para Conductores
Route::resource('conductores', ConductorController::class);

// Rutas para Notas
Route::resource('notas', NotaController::class);

// Rutas para Categorías
Route::resource('categorias', CategoriaController::class);

// Rutas para Usuarios
Route::resource('usuarios', UsuarioController::class);

// Rutas para Comentarios
Route::resource('comentarios', ComentarioController::class);