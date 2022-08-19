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
        Producto::factory(50)->create()->each(function (Producto $producto) {
            Imagen::factory(1)->create([
                'imagen_tipo_id' => $producto->id,
                'imagen_tipo' => Producto::class
            ]);
        });
    }
}
