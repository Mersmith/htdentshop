<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Usuario\Perfil\MostrarPerfil;
use App\Http\Controllers\Frontend\OrdenController;
use App\Http\Livewire\Frontend\Orden\PagoOrden;
use App\Http\Controllers\Frontend\WebhooksController;
use App\Http\Livewire\Frontend\Orden\CrearOrden;

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