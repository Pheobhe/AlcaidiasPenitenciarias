<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;
use App\Models\Destino;
use App\Models\Complejo;
use App\Models\TipoDestino;



class DestinoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $tipoDestino = TipoDestino::all();
        

        return [
            'nombre' => $this->faker->sentence(2), 
            'direccion' => $this->faker->sentence(2), 
            'telefono' => $this->faker->randomElement([2, 4, 8, 15, 30]), 
            'inauguracion' => $this->faker->datetime(),
            'tipo_destino_id' => $tipoDestino->random()->id
            
        ];
    }   
 
}

