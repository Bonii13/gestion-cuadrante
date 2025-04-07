<?php

namespace App\Http\Controllers;

use App\Models\CursoAcademico;
use Illuminate\Http\Request;

class CursoAcademicoController extends Controller
{
    public function index()
    {
        $cursos = CursoAcademico::all();
        return view('cursos_academico.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos_academico.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'horas_lectivas_profesor' => 'required|integer',
        ]);

        CursoAcademico::create($request->all());
        return redirect()->route('cursos-academico.index')->with('success', 'Curso académico creado correctamente.');
    }

    public function edit(CursoAcademico $cursos_academico)
    {
        return view('cursos_academico.edit', compact('cursos_academico'));
    }

    public function update(Request $request, CursoAcademico $cursos_academico)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'horas_lectivas_profesor' => 'required|integer',
        ]);

        $cursos_academico->update($request->all());
        return redirect()->route('cursos-academico.index')->with('success', 'Curso académico actualizado correctamente.');
    }

    public function destroy(CursoAcademico $cursos_academico)
    {
        $cursos_academico->delete();
        return redirect()->route('cursos-academico.index')->with('success', 'Curso académico eliminado.');
    }
}
