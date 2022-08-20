<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'update_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    //Relación uno a muchos
    public function medidas()
    {
        return $this->hasMany(Medida::class);
    }

    //Relación uno a muchos inversa
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    //Relación uno a muchos inversa
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    //Relación muchos a muchos
    public function colores()
    {
        return $this->belongsToMany(Color::class);
    }

    //Relación uno a muchos polimoefica
    //Metodo de su modelo
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, "imageable");
    }
}
