<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\CursoAcademico;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }

    public function create()
    {
        $cursos = CursoAcademico::all();
        
        return view('departamentos.create', compact('cursos'));
    
    }

    public function store(Request $request)
{
    // Verifica los datos recibidos
    dd($request->all());
    // Validación de los datos
    $request->validate([
        'nombre_departamento' => 'required',
        'num_profesores' => 'required|integer|min:1',
        'id_curso' => 'required|exists:cursos_academico,id',
    ]);

    $data = $request->all();
    $data['horas_totales'] = $data['num_profesores'] * 18;
    $data['horas_asignadas'] = $data['horas_asignadas'] ?? 0;

    // Intentamos crear el nuevo departamento
    Departamento::create($data);

    // Redirigimos al índice con un mensaje de éxito
    return redirect()->route('departamentos.index')->with('success', 'Departamento creado correctamente.');
}


    public function edit(Departamento $departamento)
    {
        $cursos = CursoAcademico::all();
        return view('departamentos.edit', compact('departamento', 'cursos'));
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre_departamento' => 'required',
            'num_profesores' => 'required|integer|min:1',
            'id_curso' => 'required|exists:cursos_academico,id',
        ]);

        $data = $request->all();
        $data['horas_totales'] = $data['num_profesores'] * 18;
        $data['horas_asignadas'] = $data['horas_asignadas'] ?? 0;

        $departamento->update($data);
        return redirect()->route('departamentos.index')->with('success', 'Departamento actualizado correctamente.');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index')->with('success', 'Departamento eliminado.');
    }
}
