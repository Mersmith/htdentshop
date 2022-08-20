<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoriaProductos extends Component
{
    public $categoria;
    public function render()
    {
        return view('livewire.categoria-productos');
    }
}
