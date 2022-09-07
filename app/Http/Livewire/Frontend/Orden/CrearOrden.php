<?php

namespace App\Http\Livewire\Frontend\Orden;

use Livewire\Component;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Orden;
use Gloudemans\Shoppingcart\Facades\Cart;

class CrearOrden extends Component
{
    public $tipo_envio = 1;
    public $contacto, $celular, $direccion, $referencia, $costo_envio = 0;
    public $departamentos, $ciudades = [], $distritos = [];
    public $departamento_id = "", $ciudad_id = "", $distrito_id = "";

    public $rules = [
        'contacto' => 'required',
        'celular' => 'required',
        'tipo_envio' => 'required'
    ];

    public function mount()
    {
        $this->departamentos = Departamento::all();
    }

    public function updatedTipoEnvio($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'departamento_id', 'ciudad_id', 'distrito_id', 'direccion', 'referencia'
            ]);
        }
    }

    public function updatedDepartamentoId($value)
    {
        $this->ciudades = Ciudad::where('departamento_id', $value)->get();
        $this->reset(['ciudad_id', 'distrito_id']);
    }

    public function updatedCiudadId($value)
    {
        $ciudad = Ciudad::find($value);
        $this->costo_envio = $ciudad->costo;
        $this->distritos = Distrito::where('ciudad_id', $value)->get();
        $this->reset('distrito_id');
    }

    public function crearOrden(){

        $rules = $this->rules;

        if($this->tipo_envio == 2){
            $rules['departamento_id'] = 'required';
            $rules['ciudad_id'] = 'required';
            $rules['distrito_id'] = 'required';
            $rules['direccion'] = 'required';
            $rules['referencia'] = 'required';
        }

        $this->validate($rules);

        $orden = new Orden();

        $orden->user_id = auth()->user()->id;
        $orden->contacto = $this->contacto;
        $orden->celular = $this->celular;
        $orden->tipo_envio = $this->tipo_envio;
        $orden->costo_envio = 0;
        $orden->total = $this->costo_envio + Cart::subtotal();
        $orden->contenido = Cart::content();

        if ($this->tipo_envio == 2) {
            $orden->costo_envio = $this->costo_envio;
            $orden->envio = json_encode([
                'departamento' => Departamento::find($this->departamento_id)->nombre,
                'ciudad' => Ciudad::find($this->ciudad_id)->nombre,
                'distrito' => Distrito::find($this->distrito_id)->nombre,
                'direccion' => $this->direccion,
                'referencia' => $this->referencia
            ]);
        }

        $orden->save();

        //Actualizar en descontar el Stock
        /*foreach (Cart::content() as $itemCarrito) {
            stockActualizar($itemCarrito);
        }*/

        Cart::destroy();

        return redirect()->route('orden.pagar', $orden);
    }

    public function render()
    {
        return view('livewire.frontend.orden.crear-orden');
    }
}
