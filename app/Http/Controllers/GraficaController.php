<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use DB;

class GraficaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('productos')->get();

        // Puedes pasar $categorias a tu vista para generar la gráfica.
        return view('grafica.index', compact('categorias'));
    }
}
