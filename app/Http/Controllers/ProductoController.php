<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto; // Asegúrate de importar el modelo Producto
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->paginate(7);
        return view('productos.index', compact('productos'));
    }

    public function pdf()
    {
        // Obtén los datos necesarios para el PDF (en este caso, $productos)
    $productos = Producto::all(); // Esto es solo un ejemplo, ajusta según tus necesidades.

    // Crea una vista HTML para el PDF
    $html = view('productos.pdf', compact('productos'))->render();

    // Genera el PDF con DomPDF
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);

    

// Opcionalmente, puedes personalizar la configuración del PDF, como tamaño de página, orientación, etc.
    
   
$pdf->setPaper('A4', 'portrait');

    // Descarga el PDF en el navegador
    return $pdf->download('productos.pdf');

    }


    public function create()
    {
        $categorias = Categoria::all(); // Recupera todas las categorías
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Validar y guardar el nuevo producto en la base de datos
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->estado = $request->input('estado', true);
        $producto->save();

        // Mostrar una notificación SweetAlert2
        //Alert::success('Éxito', 'Producto creado con éxito');


        return redirect()->route('productos.index'); // Redirigir a la lista de productos
    }

    public function show($id)
    {
        $producto = Producto::find($id); // Obtener un producto por su ID
        return view('productos.show', compact('producto')); // Mostrar una vista con los detalles del producto
    }

    public function edit($id)
    {
        $producto = Producto::find($id); // Obtener un producto por su ID
        $categorias = Categoria::all(); // Obtener todas las categorías (ajusta esto según tus necesidades)
        return view('productos.edit', compact('producto', 'categorias')); // Mostrar un formulario para editar el producto
    }

    public function update(Request $request, $id)
    {
        // Validar y actualizar el producto en la base de datos
        $producto = Producto::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->categoria_id = $request->input('categoria_id');
        $producto->stock = $request->input('stock');
        $producto->estado = $request->input('estado', true);
        $producto->save();

        return redirect()->route('productos.index'); // Redirigir a la lista de productos
    }

    public function destroy($id)
    {
        $producto = Producto::find($id); // Encontrar un producto por su ID
        $producto->delete(); // Eliminar el producto de la base de datos

        return redirect()->route('productos.index'); // Redirigir a la lista de productos
    }
}
