<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sliders = [
            [
                'titulo' => 'Equipos intraorales',
                'descripcion' => Str::slug('Equipos intraorales'),
                'imagen' => 'imagenes/slider/slider1.jpg',
                'ruta' => Str::slug('Equipos intraorales'),
                'estado' => 0,
                'posicion' => 1,
            ],
            [
                'titulo' => 'Equipos intraorales',
                'descripcion' => Str::slug('Equipos intraorales'),
                'imagen' => 'imagenes/slider/slider2.jpg',
                'ruta' => Str::slug('Equipos intraorales'),
                'estado' => 0,
                'posicion' => 2,
            ],
            [
                'titulo' => 'Equipos intraorales',
                'descripcion' => Str::slug('Equipos intraorales'),
                'imagen' => 'imagenes/slider/slider3.jpg',
                'ruta' => Str::slug('Equipos intraorales'),
                'estado' => 0,
                'posicion' => 3,
            ],
        ];

        foreach ($sliders as $slider) {

            Slider::create($slider);
        }
    }
}
