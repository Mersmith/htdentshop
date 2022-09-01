<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
//https://laravel.com/docs/9.x/structure#the-root-app-directory
//El app directorio contiene el código central de su aplicación. Exploraremos este directorio con más detalle pronto; sin embargo, casi todas las clases de su aplicación estarán en este directorio.
//Los controladores deben ser responsables de combinar la solicitud, la lógica comercial y la respuesta.
//Las acciones son marcadores de posición para la lógica empresarial reutilizable. Así que deberías usar ambos.
//Los Facades proporcionan una interfaz "estática" para las clases que están disponibles en el contenedor de servicios de la aplicación.
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    //Laravel Fortify es una implementación de backend de autenticación agnóstica de frontend para Laravel.
    //Validar y crear un nuevo usuario registrado.

    public function create(array $input)
    {
        //La Validator() función crea una nueva instancia de Validator con los argumentos dados.
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
