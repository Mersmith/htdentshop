<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    //Obtenga las reglas de validación utilizadas para validar contraseñas.
    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
