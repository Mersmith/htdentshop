<?php
namespace App\Http\Livewire\Frontend\Carrito;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ActualizarCarritoItem extends Component
{
    public $rowId, $cantidadCarrito, $stockProducto, $cantidadProducto;

    //mount palabra reservada, al cargar la página.
    public function mount()
    {
        $itemCarrito = Cart::get($this->rowId);
        $this->cantidadCarrito = $itemCarrito->qty;

        //$this->stockProducto = calculandoProductosDisponibles($itemCarrito->id);
    }

    public function disminuir()
    {
        $this->cantidadCarrito = $this->cantidadCarrito - 1;

        Cart::update($this->rowId, $this->cantidadCarrito);

        $this->emit('render');
    }

    public function aumentar()
    {
        $this->cantidadCarrito = $this->cantidadCarrito + 1;

        Cart::update($this->rowId, $this->cantidadCarrito);   

        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.frontend.carrito.actualizar-carrito-item');
    }
}
