<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoAcademicoController;
use App\Http\Controllers\CursoEnsenanzaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DepartamentoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('cursos-academico', CursoAcademicoController::class);
Route::resource('cursos-ensenanza', CursoEnsenanzaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('departamentos', DepartamentoController::class);


