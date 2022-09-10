<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Departamento;
use Livewire\Component;

class DepartamentoComponente extends Component
{
    public $departamentos, $departamento;

    protected $listeners = ['eliminarDepartamento'];

    public $crearFormulario = [
        'nombre' => ''
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => ''
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre'
    ];

    public function mount()
    {
        $this->traerDepartamentos();
    }

    public function traerDepartamentos()
    {
        $this->departamentos = Departamento::all();
    }

    public function crearDepartamento()
    {

        $this->validate([
            "crearFormulario.nombre" => 'required'
        ]);

        Departamento::create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerDepartamentos();

        $this->emit('guardadoMensaje');
    }

    public function editarModal(Departamento $departamento)
    {
        $this->departamento = $departamento;
        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $departamento->nombre;
    }

    public function actualizarDepartamento()
    {
        $this->departamento->nombre = $this->editarFormulario['nombre'];
        $this->departamento->save();

        $this->reset('editarFormulario');
        $this->traerDepartamentos();
    }


    public function eliminarDepartamento(Departamento $departamento)
    {
        $departamento->delete();
        $this->traerDepartamentos();
    }

    public function render()
    {
        return view('livewire.admin.departamento.departamento-componente')->layout('layouts.admin');
    }
}
