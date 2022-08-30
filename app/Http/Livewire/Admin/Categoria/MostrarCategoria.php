<?php

namespace App\Http\Livewire\Admin\Categoria;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Str;

class MostrarCategoria extends Component
{
    public $categoria, $subcategorias, $subcategoria;

    protected $listeners = ['eliminarSubcategoria'];

    protected $rules = [
        'crearFormulario.nombre' => 'required',
        'crearFormulario.ruta' => 'required|unique:subcategorias,ruta',
        'crearFormulario.color' => 'required',
        'crearFormulario.medida' => 'required',
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',
        'crearFormulario.ruta' => 'ruta',
        'crearFormulario.color' => 'color',
        'crearFormulario.medida' => 'medida',
    ];

    public $crearFormulario = [
        'nombre' => null,
        'ruta' => null,
        'color' => false,
        'medida' => false
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => null,
        'ruta' => null,
        'color' => false,
        'medida' => false
    ];

    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
        $this->traerSubcategorias();
    }

    public function traerSubcategorias()
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $this->categoria->id)->get();
    }

    public function updatedCrearFormularioNombre($value)
    {
        $this->crearFormulario['ruta'] = Str::slug($value);
    }

    public function updatedEditarFormularioNombre($value)
    {
        $this->crearFormulario['ruta'] = Str::slug($value);
    }

    public function crearSubcategoria()
    {
        $this->validate();

        $this->categoria->subcategorias()->create($this->crearFormulario);
        $this->reset('crearFormulario');
        $this->traerSubcategorias();
        $this->emit('crearSubcategoriaMensaje');

    }

    public function editarSubcategoria(Subcategoria $subcategoria)
    {
        $this->resetValidation();

        $this->subcategoria = $subcategoria;

        $this->editarFormulario['abierto'] = true;

        $this->editarFormulario['nombre'] = $subcategoria->nombre;
        $this->editarFormulario['ruta'] = $subcategoria->ruta;
        $this->editarFormulario['color'] = $subcategoria->color;
        $this->editarFormulario['medida'] = $subcategoria->medida;
    }

    public function actualizarSubcategoria()
    {
        $this->validate([
            'editarFormulario.nombre' => 'required',
            'editarFormulario.ruta' => 'required|unique:subcategorias,ruta,' . $this->subcategoria->id,
            'editarFormulario.color' => 'required',
            'editarFormulario.medida' => 'required',
        ]);

        $this->subcategoria->update($this->editarFormulario);

        $this->traerSubcategorias();
        $this->reset('editarFormulario');
    }

    public function eliminarSubcategoria(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        $this->traerSubcategorias();
    }

    public function render()
    {
        return view('livewire.admin.categoria.mostrar-categoria')->layout('layouts.admin');
    }
}
