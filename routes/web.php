<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\InicioController;
use App\Http\Controllers\Frontend\CategoriaController;
use App\Http\Controllers\Frontend\ComentarioController;
use App\Http\Controllers\Frontend\ProductoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Livewire\Frontend\Carrito\CarritoCompras;
use App\Http\Controllers\Frontend\ResenaController;
use App\Models\Orden;

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';

Route::get('/', InicioController::class)->name('inicio');

Route::get('categorias/{categoria}', [CategoriaController::class, 'mostrar'])->name('categorias.mostrar');

Route::get('productos/{producto}', [ProductoController::class, 'mostrar'])->name('productos.mostrar');

//Eliminar el carrito
Route::get('borrar', function () {
    Cart::destroy();
});

Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');

//Eliminar el carrito
Route::get('prueba', function () {
    $orders = Orden::where('user_id', 1)->select('contenido')->get()->map(function ($order) {
        return json_decode($order->contenido, true);
    });

    $products = $orders->collapse();

    //return $products->contains('id', 19);
    dd($products->contains('id', 19));
});

Route::post('resenas/{producto}', [ResenaController::class, 'store'])->name('resenas.store');
Route::post('resenas/{producto}/{comentario}', [ResenaController::class, 'respuesta'])->name('resenas.respuesta');
