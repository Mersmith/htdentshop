<?php

namespace App\Http\Livewire\Admin\Producto;

use Livewire\Component;

class EstadoProducto extends Component
{

    public $producto, $estado;

    public function mount(){
        $this->estado = $this->producto->estado;
    }

    public function save(){
        $this->producto->estado = $this->estado;
        $this->producto->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.producto.estado-producto');
    }
}
