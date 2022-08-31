<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Distrito;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Por cada Departamento se cree 8 Ciudades
        Departamento::factory(8)->create()->each(function (Departamento $departamento) {
            //Por cada Ciudad quiero que se cree 8 distritos
            Ciudad::factory(8)->create([
                'departamento_id' => $departamento->id
            ])->each(function (Ciudad $ciudad) {
                //Se crearan 8 distritos
                Distrito::factory(8)->create([
                    'ciudad_id' => $ciudad->id
                ]);
            });
        });
    }
}
