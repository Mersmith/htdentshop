<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class AgregarCarritoProductoColor extends Component
{
    public $producto, $colores;
    public $color_id = "";
    public $cantidadCarrito = 1;
    public $stockProducto = 0;

    //mount palabra reserveda, carga al iniciar la página
    public function mount()
    {
        $this->colores = $this->producto->colores;
    }

    public function render()
    {
        return view('livewire.frontend.agregar-carrito-producto-color');
    }

    //Palabra reservada con la variable color
    public function updatedColorId($value)
    {
        $this->stockProducto = $this->producto->colores->find($value)->pivot->cantidad;
    }
}
