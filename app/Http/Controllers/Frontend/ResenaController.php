<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function store(Request $request, Producto $producto)
    {

        $request->validate([
            'comentario'=>'required|min:5',
            'puntaje'=> 'required|integer|min:1|max:5'
        ]);

        $producto->resenas()->create([
            'comentario'=>$request->comentario,
            'puntaje'=>$request->puntaje,
            'user_id'=>auth()->id(),
        ]);
        
        session()->flash('flash.banner', 'Tu reseña se agrego');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();

        //return $request->all();
        //return auth()->id();
    }
}
