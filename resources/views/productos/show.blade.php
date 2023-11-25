@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Detalles del Producto</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $producto->nombre }}</h5>
                <p class="card-text">Descripción: {{ $producto->descripcion }}</p>
                <p class="card-text">Precio: ${{ $producto->precio }}</p>
                <p class="card-text">Stock: {{ $producto->stock }}</p>
                <p class="card-text">Estado: {{ $producto->estado ? 'Activo' : 'Inactivo' }}</p>
            </div>
        </div>
        
        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver al Listado</a>
    </div>
@endsection
