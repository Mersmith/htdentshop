<?php

namespace App\Http\Livewire\Admin\Marca;

use App\Models\Marca;
use Livewire\Component;

class MostrarMarca extends Component
{
    public $marcas, $marca;

    protected $listeners = ['eliminarMarca'];

    public $crearFormulario = [
        'nombre' => null
    ];

    public $editarFomulario = [
        'abierto' => false,
        'nombre' => null
    ];

    public $rules = [
        'crearFormulario.nombre' => 'required'
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',

        'editarFomulario.nombre' => 'nombre'
    ];

    public function mount()
    {
        $this->traerMarcas();
    }

    public function traerMarcas()
    {
        $this->marcas = Marca::all();
    }


    public function crearMarca()
    {
        $this->validate();

        Marca::create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerMarcas();
    }

    public function editarMarca(Marca $marca)
    {
        $this->marca = $marca;

        $this->editarFomulario['abierto'] = true;
        $this->editarFomulario['nombre'] = $marca->nombre;
    }

    public function actualizarMarca()
    {
        $this->validate([
            'editarFomulario.nombre' => 'required'
        ]);

        $this->marca->update($this->editarFomulario);
        $this->reset('editarFomulario');

        $this->traerMarcas();
    }

    public function eliminarMarca(Marca $marca)
    {
        $marca->delete();
        $this->traerMarcas();
    }


    public function render()
    {
        return view('livewire.admin.marca.mostrar-marca')->layout('layouts.admin');
    }
}
