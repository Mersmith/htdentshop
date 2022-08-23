<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProducto extends Model
{
    use HasFactory;
    protected $table = "color_producto";

    //Relación uno a muchos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
