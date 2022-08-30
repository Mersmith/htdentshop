<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Producto\MostrarProductos;
use App\Http\Livewire\Admin\Producto\EditarProducto;
use App\Http\Livewire\Admin\Producto\CrearProducto;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Livewire\Admin\Categoria\MostrarCategoria;
use App\Http\Livewire\Admin\Marca\MostrarMarca;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/crear', CrearProducto::class)->name('admin.productos.crear');
Route::get('productos/{producto}/editar', EditarProducto::class)->name('admin.productos.editar');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');

Route::get('categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('categorias/{categoria}', MostrarCategoria::class)->name('admin.categorias.mostrar');

Route::get('marcas', MostrarMarca::class)->name('admin.marcas.index');