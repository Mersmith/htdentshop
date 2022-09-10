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
        //$role = Role::create(['name' => 'admin']);

        User::create([
            'name' => 'Emerson Smith',
            'email' => 'mersmith14@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('admin');

        User::factory(50)->create();
    }
}
