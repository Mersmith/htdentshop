<?php

namespace App\Http\Livewire\Admin\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioComponente extends Component
{
    use WithPagination;
    protected $listeners = ['eliminarUsuario'];

    public $buscar;

    //Actualizar la variable Buscar y resetea la paginación.
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function asignarRol(User $userId, $value)
    {
        if ($value == '1') {
            $userId->assignRole('admin');
        } else {
            $userId->removeRole('admin');
        }
    }

    public function eliminarUsuario(User $usuario)
    {
        $usuario->delete();
        return $usuario;
    }

    public function render()
    {
        //Filtro antes y después por nombre y correo, diferente al usuario autenticado
        $usuarios = User::where('email', '<>', auth()->user()->email)
            ->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->buscar . '%');
                $query->orWhere('email', 'LIKE', '%' . $this->buscar . '%');
            })->paginate();

        return view('livewire.admin.usuario.usuario-componente', compact('usuarios'))->layout('layouts.admin');
    }
}
