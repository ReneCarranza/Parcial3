@extends('layouts.app')

@section('content')

<style>
    .btn-large {
        padding: 7px 7px;
    }

    .pagination-container {
        width: 100%;
        text-align: center;
    }


</style>

    <h1>Listado de Productos</h1>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Ver Categorías</a>
    


    
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>$ {{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ $producto->categoria->nombre }}</td>
                    <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                    <td>
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">
                    <i class="fas fa-info-circle"></i></a>

                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i></a>

                        <form method="POST" action="{{ route('productos.destroy', $producto->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?')"> <i class="fas fa-trash btn-large"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <!-- Agrega el paginador después de la tabla -->
    <div class="pagination-container">
       {{ $productos->render() }}
    </div>

    <canvas id="barChart" width="400" height="200"></canvas>

    <script src="https://d3js.org/d3.v7.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const productos = @json($productos);
    console.log(@json($productos));
    console.log(productos);

    
    // Selecciona el elemento SVG
    const svg = d3.select("#barChart");

    // Define los datos de ejemplo
    const data = productos.map(producto => ({
        categoria: producto.categoria.nombre,
        cantidad: 1
    }));

    // Crea las escalas para el eje x e y
    const x = d3.scaleBand()
        .domain(data.map(d => d.categoria))
        .range([0, 400])
        .padding(0.1);
    
    const y = d3.scaleLinear()
        .domain([0, d3.max(data, d => d.cantidad)])
        .nice()
        .range([200, 0]);

    // Agrega las barras al gráfico
    svg.selectAll("rect")
        .data(data)
        .enter()
        .append("rect")
        .attr("x", d => x(d.categoria))
        .attr("y", d => y(d.cantidad))
        .attr("width", x.bandwidth())
        .attr("height", d => 200 - y(d.cantidad))
        .attr("fill", "steelblue");
});
</script> 


@endsection
