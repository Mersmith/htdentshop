<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $medidas = Medida::all();
        foreach ($medidas as $itemMedida) {
            $itemMedida->colores()->attach(([
                1 => ['cantidad' => 10],
                2 => ['cantidad' => 10],
                3 => ['cantidad' => 10],
                4 => ['cantidad' => 10]
            ]));
        }
    }
}
