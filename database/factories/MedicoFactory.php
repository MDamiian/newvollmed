<?php

namespace Database\Factories;

use App\Models\DatosPersonales;
use App\Models\Direccion;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $datosPersonales = DatosPersonales::factory()->create();

        return [
            'datos_id' => $datosPersonales->id,
            'usuario_id' => User::factory()->create()->id,
            'activo' => $this->faker->boolean(),
            'especialidad_id' => $this->faker->numberBetween(1, 3),
        ];
    }

    /**
     * Define the additional states for the model.
     *
     * @return array
     */
    public function withDireccion()
    {
        $direccion = Direccion::factory()->create();

        return $this->state(function (array $attributes) use ($direccion) {
            return [
                'datos_id' => DatosPersonales::factory()->create(['direccion_id' => $direccion->id])->id,
            ];
        });
    }
}
