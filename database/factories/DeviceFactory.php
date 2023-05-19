<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\device;
use App\Models\producto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lugar'         => $this->faker->randomElement(['Departamento', 'Residencia', 'Bodega','Casa']),
            'espacio'          => $this->faker->randomElement(['Sala', 'Patio', 'Terraza','Estacionamiento']),
            'device'      => $this->faker->randomElement(['Cámara','Foco','Bocina','Alarma']),
            'producto_id' => producto::all()->random()->id
        ];
    }
}
