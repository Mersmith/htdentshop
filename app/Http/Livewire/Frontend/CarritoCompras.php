<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CarritoCompras extends Component
{
    protected $listeners = ['render'];

    public function destroy()
    {
        Cart::destroy();
        $this->emitTo('frontend.menu-carrrito', 'render');
    }

    public function delete($rowID)
    {
        Cart::remove($rowID);
        $this->emitTo('frontend.menu-carrrito', 'render');

    }

    public function render()
    {
        return view('livewire.frontend.carrito-compras');
    }
}
