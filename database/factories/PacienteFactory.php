<?php

namespace Database\Factories;

use App\Models\DatosPersonales;
use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $datosPersonales = DatosPersonales::factory()->create();

        return [
            'datos_id' => $datosPersonales->id,
            'usuario_id' => User::factory()->create()->id,
            'activo' => $this->faker->boolean(),
            'nss' => $this->faker->regexify('[0-9]{10}'),
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
