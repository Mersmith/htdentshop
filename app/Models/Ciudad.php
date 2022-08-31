<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'costo', 'departamento_id'];

    //Una ciudad tiene muchos distritos
    //Relación uno a mucho
    public function distritos()
    {
        return $this->hasMany(Distrito::class);
    }

    //Una ciudad tiene muchos ordenes
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
