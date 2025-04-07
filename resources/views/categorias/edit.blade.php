@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre_categoria" class="form-label">Nombre de la Categoría</label>
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" required>
                @error('nombre_categoria')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
            <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
