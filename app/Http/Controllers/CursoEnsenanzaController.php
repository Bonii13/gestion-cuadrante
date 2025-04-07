<?php

namespace App\Http\Controllers;

use App\Models\CursoEnsenanza;
use Illuminate\Http\Request;

class CursoEnsenanzaController extends Controller
{
    public function index()
    {
        $cursos = CursoEnsenanza::all();
        return view('cursos_ensenanza.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos_ensenanza.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso_ensenanza' => 'required',
        ]);

        CursoEnsenanza::create($request->all());
        return redirect()->route('cursos-ensenanza.index')->with('success', 'Curso de enseñanza creado correctamente.');
    }

    public function edit(CursoEnsenanza $cursos_ensenanza)
    {
        return view('cursos_ensenanza.edit', compact('cursos_ensenanza'));
    }

    public function update(Request $request, CursoEnsenanza $cursos_ensenanza)
    {
        $request->validate([
            'nombre_curso_ensenanza' => 'required',
        ]);

        $cursos_ensenanza->update($request->all());
        return redirect()->route('cursos-ensenanza.index')->with('success', 'Curso de enseñanza actualizado correctamente.');
    }

    public function destroy(CursoEnsenanza $cursos_ensenanza)
    {
        $cursos_ensenanza->delete();
        return redirect()->route('cursos-ensenanza.index')->with('success', 'Curso de enseñanza eliminado.');
    }
}