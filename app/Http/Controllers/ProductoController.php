<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    //
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }
}
