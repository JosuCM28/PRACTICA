<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClienteModel>
 */
class ClienteModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->firstName(),
            'apellidoPaterno'=>$this->faker->lastName(),
            'apellidoMaterno'=>$this->faker->lastName(),
            'rfc'=>$this->faker->text(13),
            'telefono'=>$this->faker->phoneNumber(),
            'correo'=>$this->faker->email(),
            'direccion'=>$this->faker->streetAddress(),
            'idProducto'=>$this->faker->numberBetween(1,10),
        ];
    }
}
