<?php

namespace App\Http\Livewire\Frontend\Producto;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoProductoColor extends Component
{
    public $producto, $colores;
    public $color_id = "";
    public $cantidadCarrito = 1;
    public $stockProducto = 0;

    public $opciones = ['medida_id' => null, 'cantidad' => null];

    //mount palabra reserveda, carga al iniciar la página
    public function mount()
    {
        $this->colores = $this->producto->colores;
        $this->opciones["imagen"] = Storage::url($this->producto->imagenes->first()->url);
        $this->opciones["puntos_ganar"] = $this->producto->puntos_ganar;
    }

    //Palabra reservada con la variable color
    public function updatedColorId($value)
    {
        $color = $this->producto->colores->find($value);
        //$this->stockProducto = $color->pivot->cantidad;
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $color->id);
        $this->opciones["color"] = $color->nombre;
        $this->opciones["cantidad"] = calculandoStockProductos($this->producto->id, $color->id);
    }

    public function render()
    {
        return view('livewire.frontend.producto.agregar-carrito-producto-color');
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
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $this->color_id);
        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu.menu-carrrito', 'render');
    }
}
