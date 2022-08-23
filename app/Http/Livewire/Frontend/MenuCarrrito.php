<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class MenuCarrrito extends Component
{

    protected $listeners = ['render'];

    public function render()
    {
        return view('livewire.frontend.menu-carrrito');
    }
}
