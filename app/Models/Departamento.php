<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    //Relacion uno a muchos
    //Un departamento tiene muchas ciudades
    public function ciudades(){
        return $this->hasMany(Ciudad::class);
    }

    public function ordenes(){
        return $this->hasMany(Orden::class);
    }
}
