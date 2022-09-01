<?php

namespace App\Http\Livewire\Frontend\Carrito;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CarritoCompras extends Component
{
    protected $listeners = ['render'];

    public function eliminarCarritoCompras()
    {
        Cart::destroy();
        $this->emitTo('frontend.menu.menu-carrrito', 'render');
    }

    public function eliminarProducto($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('frontend.menu.menu-carrrito', 'render');
    }

    public function render()
    {
        return view('livewire.frontend.carrito.carrito-compras');
    }
}
