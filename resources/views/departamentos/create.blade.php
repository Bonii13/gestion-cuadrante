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

            <button type="submit" class="btn btn-primary">Guardar Departamento</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
