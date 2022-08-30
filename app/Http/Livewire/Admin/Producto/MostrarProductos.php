<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Producto;
use Livewire\Component;

use Livewire\WithPagination;

class MostrarProductos extends Component
{
    use WithPagination;

    public $buscarProducto;

    public function updatingBuscarProducto()
    {
        $this->resetPage();
    }

    public function render()
    {
        $productos = Producto::where('nombre', 'like', '%' . $this->buscarProducto . '%')->paginate(10);
        return view('livewire.admin.producto.mostrar-productos', compact('productos'))->layout('layouts.admin');
    }
}
