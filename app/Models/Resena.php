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
        'padre_id',
        'puntaje',
        'comentario'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function respuestas(){
        return $this->hasMany(Resena::class, 'padre_id');
    }


}
