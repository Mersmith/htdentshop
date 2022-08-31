<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function pagar(Orden $orden){

        $productosCarrito = json_decode($orden->contenido);

        return view('frontend.orden.pagar', compact('orden', 'productosCarrito'));
    }
}
