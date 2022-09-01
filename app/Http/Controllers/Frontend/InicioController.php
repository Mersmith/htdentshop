<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Categoria;
use App\Models\Orden;
use App\Models\Slider;

use Illuminate\Http\Request;

/*Si la acción de un controlador es particularmente compleja, puede que le resulte conveniente dedicar una clase de controlador completa a esa única acción.
Para lograr esto, puede definir un solo __invokemétodo dentro del controlador.*/

class InicioController extends Controller
{
    public function __invoke()
    {
        //Si el usuairo esta autenticado
        if (auth()->user()) {

            $pendiente = Orden::where('estado', 1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {
                $mensaje = "Usted tiene $pendiente ordenes pendientes. <a class='font-bold' href='" . route('orden.index') . "?estado=1'>Ir a pagar</a>";
                //flash.banner->Componente de Jet
                session()->flash('flash.banner', $mensaje);
            }
        }

        $categorias = Categoria::all();
        $sliders = Slider::where('estado', '0')->get();

        return view('frontend.inicio', compact('categorias', 'sliders'));
    }
}
