<?php

namespace Database\Factories;

use App\Models\Resena;
use App\Models\User;
use App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class ResenaFactory extends Factory
{
    protected $model = Resena::class;

    public function definition()
    {
        return [
            'user_id' => User::get()->random()->id,
            'producto_id' => Producto::get()->random()->id,
            'comentario' => $this->faker->paragraph(1),
            'puntaje' =>  $this->faker->randomElement([1, 2,3,4, 5]),
        ];
    }
}
