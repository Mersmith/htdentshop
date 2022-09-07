<?php

namespace App\Http\Livewire\Admin\Orden;

use Livewire\Component;

class EstadoOrden extends Component
{
    public $orden, $estado;

    public function mount()
    {
        $this->estado = $this->orden->estado;
    }

    public function update()
    {
        $this->orden->estado = $this->estado;
        $this->orden->save();
    }


    public function render()
    {

        $productos = json_decode($this->orden->contenido);
        $envio = json_decode($this->orden->envio);

        return view('livewire.admin.orden.estado-orden', compact('productos', 'envio'));
    }
}
