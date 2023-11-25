@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>

    <form method="POST" action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="{{ $categoria->nombre }}" required>
        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="{{ route('categorias.index') }}">Volver al Listado</a>
@endsection
