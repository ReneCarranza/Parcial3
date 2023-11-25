@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Crear Producto</h1>
        
        <form method="POST" action="{{ route('productos.store') }}" class="mb-4" id="createProductForm">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" class="form-control" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" step="0.01" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" class="form-control">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            
            <div class="form-check">
                <input type="checkbox" name="estado" class="form-check-input" value="1" checked>
                <label class="form-check-label" for="estado">Activo</label>
            </div>
            
            <button type="button" class="btn btn-primary mt-3" id="createProductButton">Guardar Producto</button>
        </form>
        
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>

    <!-- Incluye SweetAlert2 en tu vista -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const createProductButton = document.getElementById('createProductButton');
            const createProductForm = document.getElementById('createProductForm');

            createProductButton.addEventListener('click', function () {
                Swal.fire({
                    title: '¿Estás seguro de que deseas crear este producto?',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, crear',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, envía el formulario
                        createProductForm.submit();
                    }
                });
            });
        });
    </script>
</script>
@endsection

