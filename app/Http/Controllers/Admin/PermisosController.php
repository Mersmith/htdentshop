<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.permisos.index', compact('permisos'));
    }

    public function create()
    {
        return view('admin.permisos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => ['required', 'min:3']]);

        Permission::create([
            'name' => $request->nombre,
        ]);

        return to_route('admin.roles.index')->with('infoCreate', 'El permiso se cre con exito');
    }

    public function edit(Permission $permiso)
    {
        $roles = Role::all();

        return view('admin.permisos.edit',  compact('permiso', 'roles'));
    }

    public function update(Request $request, Permission $permiso)
    {

        $request->validate(['nombre' => ['required', 'min:3']]);

        $permiso->update([
            'name' => $request->nombre,
        ]);

        return to_route('admin.permisos.edit', $permiso)->with('info', 'El permiso se actualizo con exito');
    }

    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        return back()->with('info', 'El rol se elimino');
    }

    public function darRol(Request $request, Permission $permiso)
    {
        if ($permiso->hasRole($request->rol)) {
            return back()->with('message', 'Rol existe.');
        }

        $permiso->assignRole($request->role);
        return back()->with('message', 'Rol asignado.');
    }

    public function revocarRol(Permission $permiso, Role $rol)
    {
        if ($permiso->hasRole($rol)) {
            $permiso->removeRole($rol);
            return back()->with('message', 'Rol elminado.');
        }

        return back()->with('message', 'Rol no existe.');
    }
}
