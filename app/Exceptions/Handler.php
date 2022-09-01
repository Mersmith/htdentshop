<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    //Una lista de tipos de excepciones con sus correspondientes niveles de registro personalizados.
    protected $levels = [
        //
    ];

    //Una lista de los tipos de excepción que no se notifican.
    protected $dontReport = [
        //
    ];

    //Una lista de las entradas que nunca se muestran en la sesión en las excepciones de validación.
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    //Registre las devoluciones de llamadas de manejo de excepciones para la aplicación.
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
