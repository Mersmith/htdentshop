<?php

namespace App\Http\Livewire\Admin\Producto;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Imagen;
use App\Models\Producto;
use App\Models\Subcategoria;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class EditarProducto extends Component
{
    public $producto, $categorias, $subcategorias, $marcas, $ruta;

    public $categoria_id;

    protected $rules = [
        'categoria_id' => 'required',
        'producto.subcategoria_id' => 'required',
        'producto.nombre' => 'required',
        'ruta' => 'required|unique:productos,ruta',
        'producto.descripcion' => 'required',
        'producto.marca_id' => 'required',
        'producto.precio' => 'required',
        'producto.cantidad' => 'numeric',
    ];

    protected $listeners = ['refreshProduct', 'delete'];

    public function mount(Producto $producto)
    {
        $this->producto = $producto;

        $this->categorias = Categoria::all();

        $this->categoria_id = $producto->subcategoria->categoria->id;

        $this->subcategorias = Subcategoria::where('categoria_id', $this->categoria_id)->get();

        $this->ruta = $this->producto->ruta;

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) {
            $query->where('categoria_id', $this->categoria_id);
        })->get();
    }

    public function refreshProduct()
    {
        $this->producto = $this->producto->fresh();
    }


    public function updatedProductoNombre($value)
    {
        $this->ruta = Str::slug($value);
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function (Builder $query) use ($value) {
            $query->where('categoria_id', $value);
        })->get();

        /* $this->reset(['subcategory_id', 'brand_id']); */
        $this->producto->subcategoria_id  = "";
        $this->producto->marca_id  = "";
    }

    public function getSubcategoriaProperty()
    {
        return Subcategoria::find($this->producto->subcategoria_id);
    }

    public function save()
    {
        $rules = $this->rules;
        $rules['ruta'] = 'required|unique:productos,ruta,' . $this->producto->id;

        if ($this->producto->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->medida) {
                $rules['producto.cantidad'] = 'required|numeric';
            }
        }

        $this->validate($rules);

        $this->producto->ruta = $this->ruta;

        $this->producto->save();

        $this->emit('saved');
    }


    public function deleteImage(Imagen $imagen)
    {
        Storage::delete([$imagen->url]);
        $imagen->delete();

        $this->producto = $this->producto->fresh();
    }

    public function delete(){

        $imagenes = $this->producto->imagenes;

        foreach ($imagenes as $imagen) {
            Storage::delete($imagen->url);
            $imagen->delete();
        }

        $this->producto->delete();

        return redirect()->route('admin.index');

    }

    public function render()
    {
        return view('livewire.admin.producto.editar-producto')->layout('layouts.admin');
    }
}
