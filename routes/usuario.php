<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Usuario\Perfil\MostrarPerfil;

Route::get('/', MostrarPerfil::class)->name('usuario.index');