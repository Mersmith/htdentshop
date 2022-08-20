<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoriaProductos extends Component
{
    public $categoria;

    public $productos = [];

    public function loadProductos()
    {
        $this->productos = $this->categoria->productos;
        $this->emit('glider');
    }

    public function render()
    {
        return view('livewire.categoria-productos');
    }
}
