<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\producto;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\producto>
 */


class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = producto::class;

    public function definition()
    {
        return[

                'marca'         => $this->faker->randomElement(['Bosh', 'Amazon', 'Samsung','Huawei']),
                'tipo'          => $this->faker->randomElement(['Camara', 'Sensor', 'Lampara','Bocina']),
                'nombre'      => $this->faker->randomElement(['P50','AirTag','Alexa','Cortana']),
                'costo'         => $this->faker->randomFloat(null, 1, 50),
         ];
        


    }
}
