<?php

namespace App\Http\Livewire\Admin\Departamento;

use App\Models\Ciudad;
use App\Models\Distrito;
use Livewire\Component;

class CiudadComponente extends Component
{
    protected $listeners = ['eliminarDistrito'];

    public $ciudad, $distritos, $distrito;

    public $crearFormulario = [
        'nombre' => '',
    ];

    public $editarFormulario = [
        'abierto' => false,
        'nombre' => '',
    ];

    protected $validationAttributes = [
        'crearFormulario.nombre' => 'nombre',
    ];

    public function mount(Ciudad $ciudad)
    {
        $this->ciudad = $ciudad;
        $this->traerDistritos();
    }

    public function traerDistritos()
    {
        $this->distritos = Distrito::where('ciudad_id', $this->ciudad->id)->get();
    }

    public function crearDistrito()
    {
        $this->validate([
            "crearFormulario.nombre" => 'required',
        ]);

        $this->ciudad->distritos()->create($this->crearFormulario);

        $this->reset('crearFormulario');

        $this->traerDistritos();

        $this->emit('guardadoMensaje');
    }

    public function editarModalDistrito(Distrito $distrito)
    {
        $this->distrito = $distrito;
        $this->editarFormulario['abierto'] = true;
        $this->editarFormulario['nombre'] = $distrito->nombre;
    }

    public function actualizarDistrito()
    {
        $this->distrito->nombre = $this->editarFormulario['nombre'];
        $this->distrito->save();

        $this->reset('editarFormulario');
        $this->traerDistritos();
    }

    public function eliminarDistrito(Distrito $distrito)
    {
        $distrito->delete();
        $this->traerDistritos();
    }

    public function render()
    {
        return view('livewire.admin.departamento.ciudad-componente')->layout('layouts.admin');
    }
}
