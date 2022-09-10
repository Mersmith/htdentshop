<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'admin']);
        $role2 = Role::create(['name'=>'vendedor']);
        $role3 = Role::create(['name'=>'logistica']);

        Permission::create(['name'=>'admin.productos.crear'])->syncRoles([$role1, $role3]);
        Permission::create(['name'=>'admin.productos.editar'])->syncRoles([$role1, $role3]);
        Permission::create(['name'=>'admin.productos.eliminar'])->syncRoles([$role1, $role3]);
        Permission::create(['name'=>'admin.productos.actualizar'])->syncRoles([$role1, $role3]);

        Permission::create(['name'=>'admin.ordenes.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'admin.ordenes.mostrar'])->syncRoles([$role1, $role2]);
    }
}
