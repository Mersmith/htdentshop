<?php

namespace App\Http\Livewire;

use App\Models\Medida;
use Livewire\Component;

class AgregarCarritoProductoMedida extends Component
{
    public $producto, $medidas;

    public $medida_id = "";

    public $colores = [];

    public $color_id = "";
    public $cantidadCarrito = 1;
    public $stockProducto = 0;

    public function mount()
    {
        $this->medidas = $this->producto->medidas;
    }

    public function render()
    {
        return view('livewire.agregar-carrito-producto-medida');
    }

    public function updatedMedidaId($value)
    {
        $dataMedida = Medida::find($value);
        $this->colores = $dataMedida->colores;
    }

    public function updatedColorId($value)
    {
        $dataMedida = Medida::find($this->medida_id);

        $this->stockProducto = $dataMedida->colores->find($value)->pivot->cantidad;
    }
}
