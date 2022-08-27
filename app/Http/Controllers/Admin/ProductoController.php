<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    //
    public function files(Producto $producto, Request $request){

        $request->validate([
            'file' => 'required|image|max:2048'
        ]);
        
        $urlImagen = Storage::put('productos', $request->file('file'));

        $producto->imagenes()->create([
            'url' => $urlImagen
        ]);
    }
}
