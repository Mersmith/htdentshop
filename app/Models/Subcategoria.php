<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;
    //No quiero que se añada masiva estos campos
    protected $guarded = ['id', 'created_at', 'update_at'];
    
    //Una subcategoria puede tener muchos productos
    //Relación uno a muchos
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    //Relación uno a muchos inversa
    //Solo tiene uan categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
