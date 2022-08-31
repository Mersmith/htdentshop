<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    //Que campos no quiero permitir que se ingrese por asignación masiva
    protected $guarded = ['id', 'created_at', 'updated_at', 'estado'];


    //Relacion uno a muchos inversa
    //Una Orden pertenece a un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    //Una Orden pertenece a una Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    //Una Orden pertenece a un distrito
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    //Una Orden pertenece a un usuario
    //Relación uno a muchos inversa
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
