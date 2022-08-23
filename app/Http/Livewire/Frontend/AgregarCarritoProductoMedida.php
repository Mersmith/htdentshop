<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Medida;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoProductoMedida extends Component
{
    public $producto, $medidas;

    public $medida_id = "";

    public $colores = [];

    public $color_id = "";
    public $cantidadCarrito = 1;
    public $stockProducto = 0;

    public $opciones = [];

    public function mount()
    {
        $this->medidas = $this->producto->medidas;
        $this->opciones["imagen"] = Storage::url($this->producto->imagenes->first()->url);
    }

    public function render()
    {
        return view('livewire.frontend.agregar-carrito-producto-medida');
    }

    public function updatedMedidaId($value)
    {
        $dataMedida = Medida::find($value);
        $this->colores = $dataMedida->colores;
        $this->opciones['medida'] = $dataMedida->nombre;
    }

    public function updatedColorId($value)
    {
        $dataMedida = Medida::find($this->medida_id);
        $color = $dataMedida->colores->find($value);
        //$this->stockProducto = $color->pivot->cantidad;
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $color->id, $dataMedida->id);
        $this->opciones['color'] = $color->nombre;
    }

    public function disminuir()
    {
        $this->cantidadCarrito = $this->cantidadCarrito - 1;
    }
    public function aumentar()
    {
        $this->cantidadCarrito = $this->cantidadCarrito + 1;
    }

    public function agregarProducto()
    {
        Cart::add(
            [
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $this->cantidadCarrito,
                'price' => $this->producto->precio,
                'weight' => 550,
                'options' => $this->opciones,
            ]
        );


        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $this->color_id, $this->medida_id);

        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu-carrrito', 'render');
    }
}
