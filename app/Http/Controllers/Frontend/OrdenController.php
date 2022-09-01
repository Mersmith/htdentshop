<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrdenController extends Controller
{

    public function index()
    {
        $ordenes = Orden::query()->where('user_id', auth()->user()->id);

        if (request('estado')) {
            $ordenes->where('estado', request('estado'));
        }

        $ordenes = $ordenes->get();

        $pendiente = Orden::where('estado', 1)->where('user_id', auth()->user()->id)->count();
        $recibido = Orden::where('estado', 2)->where('user_id', auth()->user()->id)->count();
        $enviado = Orden::where('estado', 3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orden::where('estado', 4)->where('user_id', auth()->user()->id)->count();
        $anulado = Orden::where('estado', 5)->where('user_id', auth()->user()->id)->count();

        return view('frontend.orden.index', compact('ordenes', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function mostrar(Orden $orden)
    {
        $this->authorize('autor', $orden);

        $envio = json_decode($orden->envio);
        $productosCarrito = json_decode($orden->contenido);

        return view('frontend.orden.mostrar', compact('orden', 'productosCarrito', 'envio'));
    }

    /*public function pagar(Orden $orden, Request $request)
    {
        $this->authorize('autor', $orden);

        $payment_id = $request->get('payment_id');


        $productosCarrito = json_decode($orden->contenido);
        $envio = json_decode($orden->envio);


        return view('frontend.orden.pagar', compact('orden', 'productosCarrito', 'envio'));
    }
*/
    public function pago(Orden $orden, Request $request)
    {
        $this->authorize('autor', $orden);

        $pago_id = $request->get('payment_id');
        $respuesta = Http::get("https://api.mercadopago.com/v1/payments/$pago_id" . "?access_token=APP_USR-8561333830862927-083023-1ec6a1be6d0f23e7f261f1bdf82eac53-1189431842");
        $respuesta = json_decode($respuesta);
        //dump($reponse);
        $estadoPago = $respuesta->status;
        if ($estadoPago == 'approved') {
            $orden->estado = 2;
            $orden->save();
        }
        return redirect()->route('orden.mostrar', $orden);
    }
}
