<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class MenuPrincipal extends Component
{
    public function render()
    {

        $categorias = Categoria::all();

        return view('livewire.menu-principal', compact('categorias'));
    }
}
