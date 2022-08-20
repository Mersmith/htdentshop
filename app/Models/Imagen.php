<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    //image: modelo, able: terminacion , id: id del registro para relación con el producto 
    //imageable_type: Nombre del modelo
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];

    public function imageable()
    {
        //Se puede agregar fotos desde varias tablas, para productos y ofertas
        //Se indica con que se trabaja con relación polimorfica
        return $this->morphTo();
    }
}
