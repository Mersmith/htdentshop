<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permisos = Permission::all();
        return view('admin.roles.create', compact('permisos'));
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => ['required', 'min:3']]);

        $rol = Role::create([
            'name' => $request->nombre,
        ]);

        $rol->permissions()->sync($request->permisos);

        return to_route('admin.roles.index')->with('infoCreate', 'El rol se cre con exito');
    }

    public function show(Role $rol)
    {
        return view('admin.roles.show', compact('rol'));
    }

    public function edit(Role $rol)
    {
        $permisos = Permission::all();

        return view('admin.roles.edit',  compact('permisos', 'rol'));
    }

    public function update(Request $request, Role $rol)
    {

        $request->validate(['nombre' => ['required', 'min:3']]);

        $rol->update([
            'name' => $request->nombre,
        ]);
        $rol->permissions()->sync($request->permisos);

        return to_route('admin.roles.edit', $rol)->with('info', 'El rol se actualizo con exito');
    }

    public function destroy(Role $rol)
    {
        $rol->delete();
        return redirect()->route('admin.roles.index')->with('info', 'El rol se elimino');
    }

    public function darPermiso(Request $request, Role $rol)
    {
        if ($rol->hasPermissionTo($request->permiso)) {
            return back()->with('message', 'Permiso existe.');
        }
        $rol->givePermissionTo($request->permiso);
        return back()->with('message', 'Permiso agregado.');
    }

    public function revocarPermiso(Role $rol, Permission $permiso)
    {
        if ($rol->hasPermissionTo($permiso)) {
            $rol->revokePermissionTo($permiso);
            return back()->with('message', 'Permiso eliminado.');
        }
        return back()->with('message', 'Permiso no existe');
    }
}
