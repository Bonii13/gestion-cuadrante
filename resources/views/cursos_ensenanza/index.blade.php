@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cursos de Enseñanza</h1>
        
        <a href="{{ route('cursos-ensenanza.create') }}" class="btn btn-primary mb-3">Crear nuevo curso de enseñanza</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursosEnsenanza as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nombre_curso_ensenanza }}</td>
                        <td>
                            <a href="{{ route('cursos-ensenanza.edit', $curso->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('cursos-ensenanza.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
