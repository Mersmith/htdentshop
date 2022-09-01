<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Producto;
use Livewire\Component;

class Buscar extends Component
{
    public $busqueda;

    public $abierto = false;

    public function updatedBusqueda($value)
    {
        if ($value) {
            $this->abierto = true;
        } else {
            $this->abierto = false;
        }
    }

    public function render()
    {
        //Tv de 32" Full HD
        if ($this->search) {
            $productos = Producto::where('nombre', 'LIKE', '%' . $this->busqueda . '%')
                ->where('estado', 2)
                ->take(8)
                ->get();
        } else {
            $productos = [];
        }

        return view('livewire.frontend.buscar', compact('productos'));
    }
}
