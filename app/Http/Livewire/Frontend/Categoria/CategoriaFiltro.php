<?php

namespace App\Http\Livewire\Frontend\Categoria;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;

class CategoriaFiltro extends Component
{
    use WithPagination;
    public $categoria, $subcategoria, $marca;
    public $vista = "grid";

    protected $queryString = ['subcategoria', 'marca'];

    //Palabra reservada que renderiza la pagina al cargar.
    public function render()
    {
        //$productos = $this->categoria->productos()->where('estado', 2)->paginate(2);
        /*$productos = Producto::whereHas('subcategoria.categoria', function (Builder $query) {
            $query->where('id', $this->categoria->id);
        })->paginate(20);*/
        $productosQuery = Producto::query()->whereHas('subcategoria.categoria', function (Builder $query) {
            $query->where('id', $this->categoria->id);
        });

        if ($this->subcategoria) {
            $productosQuery = $productosQuery->whereHas('subcategoria', function (Builder $query) {
                $query->where('ruta', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productosQuery = $productosQuery->whereHas('marca', function (Builder $query) {
                $query->where('nombre', $this->marca);
            });
        }

        $productos = $productosQuery->paginate(20);

        return view('livewire.frontend.categoria.categoria-filtro', compact('productos'));
    }

    public function updatedSubcategoria()
    {
        //Palabra reservada para resetear la paginación
        $this->resetPage();
    }

    public function updatedMarca()
    {
        //Palabra reservada para resetear la paginación
        $this->resetPage();
    }

    //Page campo de WithPagination 
    public function limpiarFiltro()
    {
        $this->reset(['subcategoria', 'marca', 'page']);
    }
}
