<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medida;
use Livewire\Component;

class MedidaProducto extends Component
{

    public $producto, $nombre, $abierto = false;

    public $medida, $nombre_edit;

    protected $listeners = ['delete'];

    protected $rules = [
        'nombre' => 'required'
    ];

    public function save(){
        $this->validate();

        $medida = Medida::where('producto_id', $this->producto->id)
                    ->where('nombre', $this->nombre)
                    ->first();

        if ($medida) {

            $this->emit('errorSize', 'Esa talla ya existe');
            
        } else {

            $this->producto->medidas()->create([
                'nombre' => $this->nombre
            ]);

        }

        $this->reset('nombre');

        $this->producto = $this->producto->fresh();
    }

    public function edit(Medida $medida){
        $this->abierto = true;
        $this->medida = $medida;
        $this->nombre_edit = $medida->nombre;
    }

    public function update(){
        $this->validate([
            'nombre_edit' => 'required'
        ]);

        $this->medida->nombre = $this->nombre_edit;
        $this->medida->save();

        $this->producto = $this->producto->fresh();

        $this->abierto = false;
    }

    public function delete(Medida $medida){
        $medida->delete();
        $this->producto = $this->producto->fresh();
    }


    public function render()
    {
        $medidas = $this->producto->medidas;

        return view('livewire.admin.medida-producto', compact('medidas'));
    }
}
