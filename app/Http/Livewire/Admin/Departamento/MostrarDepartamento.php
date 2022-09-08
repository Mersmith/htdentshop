<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Ciudad;
use App\Models\Departamento;
use Livewire\Component;

class MostrarDepartamento extends Component
{
    protected $listeners = ['eliminarCiudad'];

    public $departamento, $ciudades, $ciudad;

    public $crearFormulario = [
        'nombre' => '',
        'costo' => null
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => '',
        'costo' => null
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',
        'crearFormulario.costo' => 'costo'
    ];

    public function mount(Departamento $departamento)
    {
        $this->departamento = $departamento;
        $this->traerCiudades();
    }

    public function traerCiudades()
    {
        $this->ciudades = Ciudad::where('departamento_id', $this->departamento->id)->get();
    }

    public function guardarCiudad()
    {
        $this->validate([
            "crearFormulario.nombre" => 'required',
            "crearFormulario.costo" => 'required|numeric|min:1|max:100',
        ]);

        $this->departamento->ciudades()->create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerCiudades();

        $this->emit('guardadoCiudadMensaje');
    }

    public function editarCiudadModal(Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $ciudad->nombre;
        $this->editarFormulario['costo'] = $ciudad->costo;
    }

    public function actualizarCiudad()
    {
        $this->ciudad->nombre = $this->editarFormulario['nombre'];
        $this->ciudad->costo = $this->editarFormulario['costo'];
        $this->ciudad->save();

        $this->reset('editarFormulario');
        $this->traerCiudades();
    }

    public function eliminarCiudad(Ciudad $ciudad)
    {
        $ciudad->delete();
        $this->traerCiudades();
    }

    public function render()
    {
        return view('livewire.admin.departamento.mostrar-departamento')->layout('layouts.admin');
    }
}
