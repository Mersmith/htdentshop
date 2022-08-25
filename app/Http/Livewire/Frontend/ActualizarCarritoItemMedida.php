<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Color;
use App\Models\Medida;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ActualizarCarritoItemMedida extends Component
{
    public $rowId, $cantidadCarrito, $stockProducto, $cantidadProducto;

    public function mount()
    {
        $itemCarrito = Cart::get($this->rowId);
        $this->cantidadCarrito = $itemCarrito->qty;

        $color = Color::where('nombre', $itemCarrito->options->color)->first();
        $medida = Medida::where('nombre', $itemCarrito->options->size)->first();

        $this->stockProducto = calculandoProductosDisponibles($itemCarrito->id, $color->id, $medida->id);
    }

    public function render()
    {
        return view('livewire.frontend.actualizar-carrito-item-medida');
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
}
