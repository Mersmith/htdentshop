<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\InicioController;
use App\Http\Controllers\Frontend\CategoriaController;
use App\Http\Controllers\Frontend\ProductoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Livewire\Frontend\CarritoCompras;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', InicioController::class)->name('inicio');

Route::get('categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

//Eliminar el carrito
Route::get('prueba', function () {
    Cart::destroy();
});

Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
