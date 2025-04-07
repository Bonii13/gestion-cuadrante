@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Curso Académico</h1>

        <form action="{{ route('cursos-academico.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre_curso" class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="{{ old('nombre_curso') }}" required>
                @error('nombre_curso')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="horas_lectivas_profesor" class="form-label">Horas Lectivas por Profesor</label>
                <input type="number" class="form-control" id="horas_lectivas_profesor" name="horas_lectivas_profesor" value="{{ old('horas_lectivas_profesor') }}" required>
                @error('horas_lectivas_profesor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Curso</button>
            <a href="{{ route('cursos-academico.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
