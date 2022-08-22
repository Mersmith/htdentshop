<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Categoria;

class MenuPrincipal extends Component
{
    public function render()
    {

        $categorias = Categoria::all();

        return view('livewire.frontend.menu-principal', compact('categorias'));
    }
}
