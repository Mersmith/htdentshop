<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Color;
use App\Models\ColorMedida as Pivot;

class ColorMedida extends Component
{

    public $medida, $colores, $color_id, $cantidad, $abierto = false;

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
                    ->where('medida_id', $this->medida->id)
                    ->first();

        if ($pivot) {

            $pivot->cantidad = $pivot->cantidad + $this->cantidad;
            $pivot->save();
            
        }else{

            $this->medida->colores()->attach([
                $this->color_id => [
                    'cantidad' => $this->cantidad
                ]
            ]);
        }

        $this->reset(['color_id', 'cantidad']);

        $this->emit('saved');

        $this->medida = $this->medida->fresh();
    }

    public function edit(Pivot $pivot){

        $this->abierto = true;

        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_cantidad = $pivot->cantidad;
    }

    public function update(){

        $this->validate([
            'pivot_color_id' => 'required',
            'pivot_cantidad' => 'required',
        ]);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->cantidad = $this->pivot_cantidad;

        $this->pivot->save();

        $this->medida = $this->medida->fresh();

        $this->reset('abierto');
    }

    public function delete(Pivot $pivot){
        $pivot->delete();
        $this->medida = $this->medida->fresh();
    }


    public function render()
    {
        $medida_colores = $this->medida->colores;

        return view('livewire.admin.color-medida', compact('medida_colores'));
    }
}
