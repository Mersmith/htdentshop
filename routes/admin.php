<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Producto\MostrarProductos;
use App\Http\Livewire\Admin\Producto\EditarProducto;
use App\Http\Livewire\Admin\Producto\CrearProducto;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\PermisosController;
use App\Http\Livewire\Admin\Categoria\MostrarCategoria;
use App\Http\Livewire\Admin\Departamento\CiudadComponente;
use App\Http\Livewire\Admin\Departamento\DepartamentoComponente;
use App\Http\Livewire\Admin\Departamento\MostrarDepartamento;
use App\Http\Livewire\Admin\Marca\MostrarMarca;
use App\Http\Livewire\Admin\Usuario\UsuarioComponente;
use App\Http\Controllers\Admin\UsuarioController;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/crear', CrearProducto::class)->name('admin.productos.crear');
Route::get('productos/{producto}/editar', EditarProducto::class)->name('admin.productos.editar');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');

Route::get('categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
Route::get('categorias/{categoria}', MostrarCategoria::class)->name('admin.categorias.mostrar');

Route::get('marcas', MostrarMarca::class)->name('admin.marcas.index');

Route::get('ordenes', [OrdenController::class, 'index'])->middleware('can:admin.ordenes.index')->name('admin.ordenes.index');
Route::get('ordenes/{orden}', [OrdenController::class, 'mostrar'])->name('admin.ordenes.mostrar');

Route::get('departamentos', DepartamentoComponente::class)->name('admin.departamentos.index');
Route::get('departamentos/{departamento}', MostrarDepartamento::class)->name('admin.departamentos.mostrar');
Route::get('ciudades/{ciudad}', CiudadComponente::class)->name('admin.ciudades.mostrar');

Route::get('roles', [RolController::class, 'index'])->name('admin.roles.index');
Route::get('roles/crear', [RolController::class, 'create'])->name('admin.roles.create');
Route::post('roles/store', [RolController::class, 'store'])->name('admin.roles.store');
Route::get('roles/{rol}', [RolController::class, 'show'])->name('admin.roles.show');
Route::get('roles/{rol}/editar', [RolController::class, 'edit'])->name('admin.roles.edit');
Route::get('roles/{rol}/actualizar', [RolController::class, 'update'])->name('admin.roles.update');
Route::post('roles/{rol}', [RolController::class, 'destroy'])->name('admin.roles.destroy');
Route::post('/roles/{rol}/permisos', [RolController::class, 'darPermiso'])->name('roles.permisos.dar');
Route::delete('/roles/{rol}/permisos/{permiso}', [RolController::class, 'revocarPermiso'])->name('roles.permisos.revocar');

Route::get('permisos', [PermisosController::class, 'index'])->name('admin.permisos.index');
Route::get('permisos/crear', [PermisosController::class, 'create'])->name('admin.permisos.create');
Route::post('permisos/store', [PermisosController::class, 'store'])->name('admin.permisos.store');
Route::get('permisos/{permiso}', [PermisosController::class, 'show'])->name('admin.permisos.show');
Route::get('permisos/{permiso}/editar', [PermisosController::class, 'edit'])->name('admin.permisos.edit');
Route::get('permisos/{permiso}/actualizar', [PermisosController::class, 'update'])->name('admin.permisos.update');
Route::post('/permisos/{permiso}/roles', [PermisosController::class, 'darRol'])->name('admin.permisos.roles.dar');
Route::delete('/permisos/{permiso}/roles/{rol}', [PermisosController::class, 'revocarRol'])->name('admin.permisos.roles.revocar');

Route::get('usuarios', UsuarioComponente::class)->name('admin.usuarios.index');
Route::get('usuarios/{usuario}/editar', [UsuarioController::class, 'editar'])->name('admin.usuarios.editar');
Route::put('usuarios/{usuario}/actualizar', [UsuarioController::class, 'actualizar'])->name('admin.usuarios.actualizar');
//Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('admin.usuarios.show');
Route::post('usuarios/{usuario}/roles', [UsuarioController::class, 'darRol'])->name('admin.usuarios.roles');
Route::delete('usuarios/{usuario}/roles/{rol}', [UsuarioController::class, 'revocarRol'])->name('admin.usuarios.roles.remove');
Route::post('usuarios/{usuario}/permisos', [UsuarioController::class, 'darPermiso'])->name('admin.usuarios.permisos.dar');
Route::delete('usuarios/{usuario}/permisos/{permiso}', [UsuarioController::class, 'revocarPermiso'])->name('admin.usuarios.permisos.revocar');
Route::post('usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');
