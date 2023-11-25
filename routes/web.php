<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

use App\Http\Controllers\GraficaController;

Route::get('/', function () {
    return view('auth.login');
});

//RUTA PARA EL PDF DE PRODUCTOS
Route::get('productos/pdf', [ProductoController::class, 'pdf'])->name('productos.pdf');


Auth::routes();



Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::resource('categorias', CategoriaController::class);
Route::get('/grafica-categorias', [GraficaController::class, 'index']);