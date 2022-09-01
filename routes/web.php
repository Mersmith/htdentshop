<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\InicioController;
use App\Http\Controllers\Frontend\CategoriaController;
use App\Http\Controllers\Frontend\ProductoController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Livewire\Frontend\Orden\CrearOrden;
use App\Http\Livewire\Frontend\Carrito\CarritoCompras;
use App\Http\Controllers\Frontend\OrdenController;
use App\Http\Controllers\Frontend\WebhooksController;
use App\Http\Livewire\Frontend\Orden\PagoOrden;

Route::get('/', InicioController::class)->name('inicio');

Route::get('categorias/{categoria}', [CategoriaController::class, 'mostrar'])->name('categorias.mostrar');

Route::get('productos/{producto}', [ProductoController::class, 'mostrar'])->name('productos.mostrar');

//Eliminar el carrito
Route::get('prueba', function () {
    Cart::destroy();
});

Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');

Route::middleware(['auth'])->group(
    function () {
        Route::get('orden', [OrdenController::class, 'index'])->name('orden.index');
        Route::get('orden/crear', CrearOrden::class)->name('orden.crear');
        Route::get('orden/{orden}', [OrdenController::class, 'mostrar'])->name('orden.mostrar');
        Route::get('orden/{orden}/pagar', PagoOrden::class)->name('orden.pagar');
        Route::get('orden/{orden}/pago', [OrdenController::class, 'pago'])->name('orden.pago');

        Route::post('webhooks', WebhooksController::class);
    }
);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
