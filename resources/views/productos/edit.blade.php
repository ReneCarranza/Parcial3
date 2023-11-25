@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Producto</h1>
        
        <form method="POST" action="{{ route('productos.update', ['id' => $producto->id]) }}" class="mb-4">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}" class="form-control" required>
            </div>

            
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" value="{{ $producto->stock }}" class="form-control" required>
            </div>

            <select name="categoria_id">
    <option value="" selected>Selecciona una categoría</option>
    @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
    @endforeach
</select>
            
            <div class="form-check">
                <input type="checkbox" name="estado" value="1" {{ $producto->estado ? 'checked' : '' }} class="form-check-input">
                <label class="form-check-label" for="estado">Activo</label>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
        </form>
        
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
@endsection

