<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    //
    public function show(Producto $producto)
    {
        return view('frontend.productos.show', compact('producto'));
    }
}
