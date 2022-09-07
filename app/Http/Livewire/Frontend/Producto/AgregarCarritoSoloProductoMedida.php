<?php

namespace App\Http\Livewire\Frontend\Producto;

use Livewire\Component;
use App\Models\Medida;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoSoloProductoMedida extends Component
{
    protected $listeners = ['agregarProducto'];

    public $producto, $medidas;
    public $medida_id = "";
    public $colores = [];
    public $color_id = "";
    public $cantidadCarrito = 1;
    public $stockProducto = 0;

    public $opciones = ['cantidad' => null];

    public function mount()
    {
        $this->medidas = $this->producto->medidas;
        $this->opciones["imagen"] = Storage::url($this->producto->imagenes->first()->url);
        if ($this->producto->cantidad) {
            $this->opciones["cantidad"] = $this->producto->cantidad;
        } else {
            $this->opciones["cantidad"] = $this->producto->stock;
        }
    }

    public function render()
    {
        return view('livewire.frontend.producto.agregar-carrito-solo-producto-medida');
    }
  
    public function disminuir()
    {
        $this->cantidadCarrito = $this->cantidadCarrito - 1;
    }

    public function aumentar()
    {
        $this->cantidadCarrito = $this->cantidadCarrito + 1;
    }

    public function agregarProducto($value, $value2)
    {
        //dump($value, $value2);
        $dataMedida = Medida::find($value);
        $this->colores = $dataMedida->colores;
        $this->opciones['medida'] = $dataMedida->nombre;
        $this->opciones['medida_id'] = $dataMedida->id;

        $color = $dataMedida->colores->find(5);
        $this->stockProducto = calculandoProductosDisponibles($this->producto->id, $color->id, $dataMedida->id);
        $this->opciones['color'] = $color->nombre;

        Cart::add(
            [
                'id' => $this->producto->id,
                'name' => $this->producto->nombre,
                'qty' => $value2,
                'price' => $this->producto->precio,
                'weight' => 550,
                'options' => $this->opciones,
            ]
        );

        $this->reset('cantidadCarrito');

        $this->emitTo('frontend.menu.menu-carrrito', 'render');
    }
}
