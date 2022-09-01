<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {

        $ordenes = Orden::query()->where('estado', '<>', 1);

        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
        }

        $ordenes = $ordenes->get();


        $pendiente = Orden::where('estado', 1)->count();
        $recibido = Orden::where('estado', 2)->count();
        $enviado = Orden::where('estado', 3)->count();
        $entregado = Orden::where('estado', 4)->count();
        $anulado = Orden::where('estado', 5)->count();

        return view('admin.orden.index', compact('ordenes', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function mostrar(Orden $orden){
        return view('admin.orden.mostrar', compact('orden'));
    }
}
