
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Curso de Enseñanza</h1>

        <form action="{{ route('cursos-ensenanza.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre_curso_ensenanza" class="form-label">Nombre del Curso de Enseñanza</label>
                <input type="text" class="form-control" id="nombre_curso_ensenanza" name="nombre_curso_ensenanza" value="{{ old('nombre_curso_ensenanza') }}" required>
                @error('nombre_curso_ensenanza')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Curso</button>
            <a href="{{ route('cursos-ensenanza.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
