@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>

    <form method="POST" action="{{ route('categorias.store') }}">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Guardar Categoría</button>
    </form>

    <a href="{{ route('categorias.index') }}">Volver al Listado</a>
@endsection
