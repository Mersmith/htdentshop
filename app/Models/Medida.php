<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'producto_id'];

    //Relación uno a muchos inversa
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    //Una talla puede tener muchos colores e inversa
    //Relación muchos a muchos
    public function colores()
    {
        return $this->belongsToMany(Color::class)->withPivot('cantidad', 'id');
    }
}
