@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Departamentos</h1>

        <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear nuevo departamento</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->id }}</td>
                        <td>{{ $departamento->nombre_departamento }}</td>
                        <td>
                            <a href="{{ route('departamentos.edit', $departamento->id) }}" class="btn btn-warning">Editar</a>

                            <form action="{{ route('departamentos.destroy', $departamento->id) }}" method="POST" style="display:inline;">
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
