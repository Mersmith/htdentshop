<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Producto\MostrarProductos;
use App\Http\Livewire\Admin\Producto\EditarProducto;
use App\Http\Livewire\Admin\Producto\CrearProducto;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Livewire\Admin\Categoria\MostrarCategoria;
use App\Http\Livewire\Admin\Departamento\CiudadComponente;
use App\Http\Livewire\Admin\Departamento\DepartamentoComponente;
use App\Http\Livewire\Admin\Departamento\MostrarDepartamento;
use App\Http\Livewire\Admin\Marca\MostrarMarca;
use App\Http\Livewire\Admin\Usuario\UsuarioComponente;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/crear', CrearProducto::class)->name('admin.productos.crear');
Route::get('productos/{producto}/editar', EditarProducto::class)->name('admin.productos.editar');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');

Route::get('categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('categorias/{categoria}', MostrarCategoria::class)->name('admin.categorias.mostrar');

Route::get('marcas', MostrarMarca::class)->name('admin.marcas.index');

Route::get('usuarios', UsuarioComponente::class)->name('admin.usuarios.index');

Route::get('ordenes', [OrdenController::class, 'index'])->name('admin.ordenes.index');
Route::get('ordenes/{orden}', [OrdenController::class, 'mostrar'])->name('admin.ordenes.mostrar');

Route::get('departamentos', DepartamentoComponente::class)->name('admin.departamentos.index');
Route::get('departamentos/{departamento}', MostrarDepartamento::class)->name('admin.departamentos.mostrar');
Route::get('ciudades/{ciudad}', CiudadComponente::class)->name('admin.ciudades.mostrar');