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
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'writer']);
        $role3 = Role::create(['name' => 'user']);

        Permission::create(['name' => 'admin.productos.crear', 'description' => 'Crear productos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.productos.editar', 'description' => 'Editar productos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.productos.eliminar', 'description' => 'Eliminar productos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.productos.actualizar', 'description' => 'Actualizar productos'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'admin.ordenes.index', 'description' => 'Ver ordenes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.ordenes.mostrar', 'description' => 'Ver orden'])->syncRoles([$role1, $role2]);
    }
}
