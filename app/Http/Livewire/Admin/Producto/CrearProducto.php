<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Subcategoria;
use App\Models\Producto;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;


class CrearProducto extends Component
{

    public $categorias, $subcategorias = [], $marcas = [];

    public $categoria_id = "",  $subcategoria_id = "", $marca_id;
    public $nombre, $ruta, $descripcion, $precio, $cantidad;

    protected $rules = [
        'categoria_id' => 'required',
        'subcategoria_id' => 'required',
        'marca_id' => 'required',
        'nombre' => 'required',
        'ruta' => 'required|unique:productos',
        'descripcion' => 'required',
        'precio' => 'required',
    ];


    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) use ($value) {
            $query->where('categoria_id', $value);
        })->get();

        $this->reset(['subcategoria_id', 'marca_id']);
    }

    public function updatedNombre($value)
    {
        $this->ruta = Str::slug($value);
    }

    public function getSubcategoriaProperty(){
        return Subcategoria::find($this->subcategoria_id);
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function save(){

        $rules = $this->rules;

        if ($this->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->medida) {
                $rules['cantidad'] = 'required';
            }
        }

        $this->validate($rules);

        $producto = new Producto();

        $producto->nombre = $this->nombre;
        $producto->ruta = $this->ruta;
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->subcategoria_id  = $this->subcategoria_id;
        $producto->marca_id  = $this->marca_id;
        if ($this->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->medida) {
                $producto->cantidad = $this->cantidad;
            }
        }

        $producto->save();

        return redirect()->route('admin.productos.editar', $producto);
    }


    public function render()
    {
        return view('livewire.admin.producto.crear-producto')->layout('layouts.admin');
    }
}
