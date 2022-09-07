<?php

namespace App\Policies;

use App\Models\Orden;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;

    public function productoComprado(User $user, Producto $producto)
    {

        $resenas = $producto->resenas()->where('user_id', $user->id)->count();

        if($resenas){
            return false;
        }

        $ordenes = Orden::where('user_id', $user->id)->select('contenido')->get()->map(function ($orden) {
            return json_decode($orden->contenido, true);
        });

        $productos = $ordenes->collapse();

        return $productos->contains('id', $producto->id);
    }
}
