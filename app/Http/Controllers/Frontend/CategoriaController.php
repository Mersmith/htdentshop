<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function mostrar(Categoria $categoria)
    {
        return view('frontend.categorias.mostrar', compact('categoria'));
    }
}
