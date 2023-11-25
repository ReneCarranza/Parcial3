<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    // Crear y guardar la nueva categoría
    $categoria = new Categoria();
    $categoria->nombre = $request->input('nombre');
    $categoria->save();

    // Redirigir de vuelta al listado de categorías
    return redirect()->route('categorias.index');
}


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        // Validar y actualizar la categoría
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        // Redirigir de nuevo a la vista de lista de categorías
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        // Eliminar la categoría
        // Redirigir de nuevo a la vista de lista de categorías
    }
}

