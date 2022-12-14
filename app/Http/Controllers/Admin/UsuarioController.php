<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuarioController extends Controller
{
    public function editar(User $usuario)
    {
        $roles = Role::all();
        return view('admin.usuario.editar', compact('roles', 'usuario'));
    }

    public function actualizar(Request $request, User $usuario)
    {
        $usuario->roles()->sync(request()->input("roles", []));

        return redirect()->route('admin.usuarios.editar', $usuario)->with('respuesta', 'Se asigno el rol');
    }

    public function show(User $usuario)
    {
        $roles = Role::all();
        $permisos = Permission::all();

        return view('admin.usuario.show', compact('usuario', 'roles', 'permisos'));
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'Eres admin.');
        }
        $user->delete();

        return back()->with('message', 'Usuario eliminado.');
    }

    public function darRol(Request $request, User $usuario)
    {
        if ($usuario->hasRole($request->rol)) {
            return back()->with('message', 'Rol existe.');
        }

        $usuario->assignRole($request->rol);
        return back()->with('message', 'Rol asignado.');
    }

    public function revocarRol(User $usuario, Role $rol)
    {
        if ($usuario->hasRole($rol)) {
            $usuario->removeRole($rol);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Rol no existe.');
    }

    public function darPermiso(Request $request, User $usuario)
    {
        if ($usuario->hasPermissionTo($request->permiso)) {
            return back()->with('message', 'Permiso existe.');
        }
        $usuario->givePermissionTo($request->permiso);
        return back()->with('message', 'Permiso agregado.');
    }

    public function revocarPermiso(User $usuario, Permission $permiso)
    {
        if ($usuario->hasPermissionTo($permiso)) {
            $usuario->revokePermissionTo($permiso);
            return back()->with('message', 'permiso eliminado.');
        }
        return back()->with('message', 'permiso no existe.');
    }
}
