<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emerson Smith',
            'email' => 'mersmith14@gmail.com',
            'password' => bcrypt('123456789'),
            'puntos' => 50,
        ])->assignRole('admin', 'almacen');

        User::factory(50)->create();
    }
}
