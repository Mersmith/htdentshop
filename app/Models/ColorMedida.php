<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorMedida extends Model
{
    use HasFactory;
    protected $table = "color_medida";

    //Relación uno a muchos inversa
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function medida(){
        return $this->belongsTo(Medida::class);
    }

}
