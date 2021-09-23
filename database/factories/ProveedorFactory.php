<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' =>Str::random(5),
            'apellido' =>Str::random(5),
            'celular' => random_int(1,50),
            'correo' =>Str::random(5),
            'estado' =>Str::random(5)
        ];
    }
}
