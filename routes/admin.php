<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\MostrarProductos;
use App\Http\Livewire\Admin\CrearProducto;
use App\Http\Livewire\Admin\EditarProducto;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/crear', CrearProducto::class)->name('admin.productos.crear');
Route::get('productos/{producto}/editar', EditarProducto::class)->name('admin.productos.editar');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');

//Route::get('categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
