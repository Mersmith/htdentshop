<?php

namespace App\Http\Livewire\Admin\Producto;

use Livewire\Component;
use App\Models\Color;
use App\Models\ColorProducto as Pivot;


class ColorProducto extends Component
{


    public $producto, $colores, $color_id, $cantidad, $abierto = false;

    public $pivot, $pivot_color_id, $pivot_cantidad;

    protected $listeners = ['delete'];

    protected $rules = [
        'color_id' => 'required',
        'cantidad' => 'required|numeric'
    ];

    public function mount(){
        $this->colores = Color::all();
    }

    public function save(){
        $this->validate();

        $pivot = Pivot::where('color_id', $this->color_id)
                    ->where('producto_id', $this->producto->id)
                    ->first();

        if ($pivot) {

            $pivot->cantidad = $pivot->cantidad + $this->cantidad;
            $pivot->save();

        } else {
            
            $this->producto->colores()->attach([
                $this->color_id => [
                    'cantidad' => $this->cantidad
                ]
            ]);
            
        }

        $this->reset(['color_id', 'cantidad']);

        $this->emit('saved');

        $this->producto = $this->producto->fresh();

    }

    public function edit(Pivot $pivot){
        $this->abierto = true;

        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_cantidad = $pivot->cantidad;
    }

    public function update(){
        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->cantidad = $this->pivot_cantidad;

        $this->pivot->save();

        $this->producto = $this->producto->fresh();

        $this->abierto = false;
    }

    public function delete(Pivot $pivot){
        $pivot->delete();
        $this->producto = $this->producto->fresh();
    }

    public function render()
    {
        $producto_colores = $this->producto->colores;

        return view('livewire.admin.producto.color-producto', compact('producto_colores'));
    }
}
