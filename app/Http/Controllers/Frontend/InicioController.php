<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Categoria;
use App\Models\Slider;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function __invoke()
    {
        $categorias = Categoria::all();

        $sliders = Slider::where('estado', '0')->get();


        return view('frontend.inicio', compact('categorias', 'sliders'));
    }
}
