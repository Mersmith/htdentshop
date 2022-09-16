<?php

namespace App\Http\Livewire\Admin\Cupon;

use App\Models\Cupon;
use Livewire\Component;

class EditarCupones extends Component
{
    public $codigo, $tipo, $descuento, $carrito_monto, $fecha_expiracion;
    public $cupon_id;

    public function mount($cupon)
    {
        $cuponDato = Cupon::find($cupon);
        $this->codigo = $cuponDato->codigo;
        $this->tipo = $cuponDato->tipo;
        $this->descuento = $cuponDato->descuento;
        $this->carrito_monto = $cuponDato->carrito_monto;
        $this->fecha_expiracion = $cuponDato->fecha_expiracion;
        $this->cupon_id = $cuponDato->id;
    }

    public function actualizarCupon()
    {
        $this->validate([
            'codigo' => 'required',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);

        $cupon = Cupon::find($this->cupon_id);

        $cupon->codigo = $this->codigo;
        $cupon->tipo = $this->tipo;
        $cupon->descuento = $this->descuento;
        $cupon->carrito_monto = $this->carrito_monto;
        $cupon->fecha_expiracion = $this->fecha_expiracion;

        $cupon->save();
        session()->flash('message', 'Cupon creado');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'codigo' => 'required',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);
    }
    public function render()
    {
        return view('livewire.admin.cupon.editar-cupones');
    }
}
