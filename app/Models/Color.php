<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    //Relación muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function medidas()
    {
        return $this->belongsToMany(Medida::class);
    }
}
