<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    //Define los campos que queremos habilitar en una asignación masiva
    protected $fillable = ['nombre', 'ruta', 'icono', 'imagen'];

    //Una Categoria puede tener varias subcategorias
    //Relación uno a muchos
    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

    //Muchas Categorias puede tener varias marcas
    //Relación muchos a muchos
    //Una Categoria pertenece y tiene muchas Marcas
    public function marcas()
    {
        return $this->belongsToMany(Marca::class);
    }

    //Relación de una a mucho, a travez de la relación Subategoria
    //Una Categoria tiene muchos Productos atreves de SubCategoria
    public function productos()
    {
        return $this->hasManyThrough(Producto::class, Subcategoria::class);
    }

    //URl amigables
    public function getRouteKeyName()
    {
        return 'ruta';
    }
}
