<?php

use App\Models\Producto;
use App\Models\Medida;
use Gloudemans\Shoppingcart\Facades\Cart;

//Laravel incluye una variedad de funciones PHP "Helpers" globales. Muchas de estas funciones son utilizadas por el marco mismo.

/*A veces puede ser necesario eliminar un rol de un usuario.
Para eliminar un registro de relación de varios a varios, utilice el detach método.
El detach método eliminará el registro apropiado de la tabla intermedia; sin embargo, ambos modelos permanecerán en la base de datos.*/

/*Por ejemplo, imaginemos que un usuario puede tener muchos roles y un rol puede tener muchos usuarios.
Puede usar el attachmétodo para adjuntar un rol a un usuario insertando un registro en la tabla intermedia de la relación.*/

//Calculamos el stock de los productos
function calculandoStockProductos($producto_id, $color_id = null, $medida_id = null)
{
    $producto = Producto::find($producto_id);

    if ($medida_id) {
        $medida = Medida::find($medida_id);
        $cantidad = $medida->colores->find($color_id)->pivot->cantidad;
    } elseif ($color_id) {

        $cantidad = $producto->colores->find($color_id)->pivot->cantidad;
    } else {
        $cantidad = $producto->cantidad;
    }
    return $cantidad;
}

//Calculamos la cantidad de productos agregados
function calculandoProductosAgregados($producto_id, $color_id = null, $medida_id = null)
{
    $carrito = Cart::content();
    $item = $carrito->where('id', $producto_id)
        ->where('options.color_id', $color_id)
        ->where('options.medida_id', $medida_id)
        ->first();
    if ($item) {
        return $item->qty;
    } else {
        return 0;
    }
}

//Calculamos la cantidad que aun puedo agregar al carrito
function calculandoProductosDisponibles($producto_id, $color_id = null, $medida_id = null)
{
    return calculandoStockProductos($producto_id, $color_id, $medida_id) - calculandoProductosAgregados($producto_id, $color_id, $medida_id);
}

//Actualizar en descontar el Stock
function stockActualizar($itemCarrito)
{
    $producto = Producto::find($itemCarrito->id);
    $calculandoProductosDisponibles = calculandoProductosDisponibles($itemCarrito->id, $itemCarrito->options->color_id, $itemCarrito->options->medida_id);

    if ($itemCarrito->options->medida_id) {

        $medida = Medida::find($itemCarrito->options->medida_id);
        $medida->colores()->detach($itemCarrito->options->color_id);
        $medida->colores()->attach([
            $itemCarrito->options->color_id => ['cantidad' => $calculandoProductosDisponibles]
        ]);
    } elseif ($itemCarrito->options->color_id) {

        $producto->colores()->detach($itemCarrito->options->color_id);
        $producto->colores()->attach([
            $itemCarrito->options->color_id => ['cantidad' => $calculandoProductosDisponibles]
        ]);
    } else {

        $producto->cantidad = $calculandoProductosDisponibles;
        $producto->save();
    }
}

//Anular el Orden
function anularOrden($itemCarrito)
{
    $producto = Producto::find($itemCarrito->id);
    $calculandoStockProductos = calculandoStockProductos($itemCarrito->id, $itemCarrito->options->color_id, $itemCarrito->options->medida_id) + $itemCarrito->qty;

    if ($itemCarrito->options->medida_id) {

        $medida = Medida::find($itemCarrito->options->medida_id);
        $medida->colores()->detach($itemCarrito->options->color_id);
        $medida->colores()->attach([
            $itemCarrito->options->color_id => ['cantidad' => $calculandoStockProductos]
        ]);
    } elseif ($itemCarrito->options->color_id) {

        $producto->colores()->detach($itemCarrito->options->color_id);
        $producto->colores()->attach([
            $itemCarrito->options->color_id => ['cantidad' => $calculandoStockProductos]
        ]);
    } else {
        $producto->cantidad = $calculandoStockProductos;
        $producto->save();
    }
}
