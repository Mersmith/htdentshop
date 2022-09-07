<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'producto_id',
        'puntaje',
        'comentario'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

}
