<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productos = Producto::whereHas('subcategoria', function (Builder $query) {
            $query->where('color', true)
                ->where('medida', false);
        })->get();

        foreach ($productos as $producto) {
            $producto->colores()->attach([
                1 => [
                    'cantidad' => 10
                ],
                2 => [
                    'cantidad' => 10
                ],
                3 => [
                    'cantidad' => 10
                ],
                4 => [
                    'cantidad' => 10
                ]
            ]);
        }
    }
}
