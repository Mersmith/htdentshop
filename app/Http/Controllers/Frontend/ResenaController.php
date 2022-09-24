<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function store(Request $request, Producto $producto)
    {
        $request->validate([
            'comentario' => 'required|min:5',
            'puntaje' => 'required|integer|min:1|max:5',
        ]);

        $producto->resenas()->create([
            'comentario' => $request->comentario,
            'puntaje' => $request->puntaje,
            'user_id' => auth()->id()
        ]);

        session()->flash('flash.banner', 'Tu reseña se agrego');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

    public function respuesta(Request $request, Producto $producto, Resena $comentario)
    {

        //return $request->all();
        /*$reply = new Resena;

        $reply->comentario = $request->get('comentario');
        $reply->puntaje = $request->get('puntaje');

        $reply->user()->associate($request->user());

        $reply->padre_id = $request->get($comentario->id);

        $producto->resenas()->save($reply);*/

        //return $comentario->id;

        $request->validate([
            'comentario' => 'required|min:5',
            'puntaje' => 'required|integer|min:1|max:5',
            'padre_id' => 'required|integer',
        ]);

        $producto->resenas()->create([
            'comentario' => $request->comentario,
            'padre_id' => (int)$request->padre_id,
            'puntaje' => $request->puntaje,
            'user_id' => auth()->id()
        ]);

        session()->flash('flash.banner', 'Tu reseña se agrego');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
