<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CursoAcademico;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        $cursos = CursoAcademico::all();
        return view('categorias.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required',
            'id_curso' => 'required|exists:cursos_academico,id',
        ]);

        Categoria::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        $cursos = CursoAcademico::all();
        return view('categorias.edit', compact('categoria', 'cursos'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre_categoria' => 'required',
            'id_curso' => 'required|exists:cursos_academico,id',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada.');
    }
}
