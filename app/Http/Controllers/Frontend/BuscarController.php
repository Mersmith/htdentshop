<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class BuscarController extends Controller
{
    public function __invoke(Request $request)
    {

        $nombre = $request->nombre;
        $productos = Producto::where('nombre', 'LIKE', '%' . $nombre . '%')
            ->where('estado', 2)
            ->paginate(8);

        return view('buscar', compact('productos'));
    }
}
