<?php

namespace Database\Factories;

use App\Models\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatosPersonales>
 */
class DatosPersonalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'curp' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
            'telefono' => $this->faker->phoneNumber(),
            'direccion_id' => function () {
                // Crea una nueva dirección y devuelve su ID
                return Direccion::factory()->create()->id;
            },
        ];
    }
}
