<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    //
    public function show(Categoria $categoria){
        return view('frontend.categorias.show', compact('categoria'));

    }
}
