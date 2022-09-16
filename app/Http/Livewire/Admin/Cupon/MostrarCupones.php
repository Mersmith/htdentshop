<?php

namespace App\Http\Livewire\Admin\Cupon;

use App\Models\Cupon;
use Livewire\Component;

class MostrarCupones extends Component
{

    public function eliminarCupon($cuponId)
    {
        $cupon = Cupon::find($cuponId);
        $cupon->delete();
        session()->flash('message', 'Cupon eliminado');
    }

    public function render()
    {
        $cupones = Cupon::all();
        return view('livewire.admin.cupon.mostrar-cupones', ['cupones' => $cupones])->layout('layouts.admin');
    }
}
