<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Producto::factory(20)->create()->each(function (Producto $producto) {
            Imagen::factory(1)->create([
                'imageable_id' => $producto->id,
                'imageable_type' => Producto::class
            ]);
        });
    }
}
