<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function mostrar(Producto $producto)
    {
        $producto =  $producto->with(
            'resenas.respuestas',
            'resenas.user:id,name',
            'resenas.respuestas.user:id,name',
            'resenas.respuestas.respuestas',
            'resenas.respuestas.respuestas.user:id,name'

        )->first();

        return view('frontend.productos.mostrar', compact('producto'));
    }
}
