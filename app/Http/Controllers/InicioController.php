<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function __invoke()
    {
        $categorias = Categoria::all();
        return view('inicio', compact('categorias'));
    }
}
