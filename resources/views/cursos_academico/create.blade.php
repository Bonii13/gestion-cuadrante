@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Departamento</h1>

        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre_departamento" class="form-label">Nombre del Departamento</label>
                <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" value="{{ old('nombre_departamento') }}" required>
                @error('nombre_departamento')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="num_profesores" class="form-label">Número de Profesores</label>
                <input type="number" class="form-control" id="num_profesores" name="num_profesores" value="{{ old('num_profesores') }}" required>
                @error('num_profesores')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_curso" class="form-label">Curso Académico</label>
                <select class="form-control" id="id_curso" name="id_curso" required>
                    <option value="">Seleccione un curso</option>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ old('id_curso') == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
                @error('id_curso')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="horas_asignadas" class="form-label">Horas Asignadas</label>
                <input type="number" class="form-control" id="horas_asignadas" name="horas_asignadas" value="{{ old('horas_asignadas', 0) }}">
                @error('horas_asignadas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar Departamento</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
