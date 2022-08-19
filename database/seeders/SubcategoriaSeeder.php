<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subcategorias = [
            /* Equipos intraorales */
            [
                'categoria_id' => 1,
                'nombre' => 'Rayos x Portatil',
                'ruta' => Str::slug('Rayos x Portatil'),
                'color' => true
            ],

            [
                'categoria_id' => 1,
                'nombre' => 'Sensor RVG',
                'ruta' => Str::slug('Sensor RVG'),
            ],

            [
                'categoria_id' => 1,
                'nombre' => 'Digitalizador Intraoral',
                'ruta' => Str::slug('Digitalizador Intraoral'),
            ],

            /* Equipos extraorales */

            [
                'categoria_id' => 2,
                'nombre' => 'Vatech',
                'ruta' => Str::slug('Vatech'),
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Pointnix',
                'ruta' => Str::slug('Pointnix'),
            ],

            /* Materiales */
            [
                'categoria_id' => 3,
                'nombre' => 'Zirconia',
                'ruta' => Str::slug('Zirconia'),
                'color' => true,
                'medida' => true
            ],

            /* Implantes */
            [
                'categoria_id' => 4,
                'nombre' => 'Point Implant ',
                'ruta' => Str::slug('Point Implant '),
            ],

            [
                'categoria_id' => 4,
                'nombre' => 'Megagen',
                'ruta' => Str::slug('Megagen'),
            ],

            [
                'categoria_id' => 4,
                'nombre' => 'Kuwotech',
                'ruta' => Str::slug('Kuwotech'),
            ],



        ];


        foreach ($subcategorias as $subcategoria) {
            Subcategoria::factory(1)->create($subcategoria);
        }
    }
}
