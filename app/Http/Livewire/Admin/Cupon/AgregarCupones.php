<?php

namespace App\Http\Livewire\Admin\Cupon;

use App\Models\Cupon;
use Livewire\Component;

class AgregarCupones extends Component
{
    public $codigo, $tipo, $descuento, $carrito_monto, $fecha_expiracion;

    public function crearCupon()
    {
        $this->validate([
            'codigo' => 'required|unique:cupons',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);

        $cupon = new Cupon();
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
            'codigo' => 'required|unique:cupons',
            'tipo' => 'required',
            'descuento' => 'required|numeric',
            'carrito_monto' => 'required|numeric',
            'fecha_expiracion' => 'required',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.cupon.agregar-cupones')->layout('layouts.admin');
    }
}
