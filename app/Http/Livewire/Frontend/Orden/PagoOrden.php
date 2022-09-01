<?php

namespace App\Http\Livewire\Frontend\Orden;

use App\Models\Orden;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PagoOrden extends Component
{
    use AuthorizesRequests;

    public $orden;

    protected $listeners = ['pagarOrden'];


    public function mount(Orden $orden){
        $this->orden = $orden;
    }

    public function pagarOrden(){
        $this->orden->estado = 2;
        $this->orden->save();

        return redirect()->route('orden.mostrar', $this->orden);
    }

    public function render()
    {
        //$this->authorize('autor', $this->orden);
        //$this->authorize('pagador', $this->orden);

        $envio = json_decode($this->orden->envio);
        $productosCarrito = json_decode($this->orden->contenido);
        return view('livewire.frontend.orden.pago-orden', compact('productosCarrito', 'envio'));
    }
}
