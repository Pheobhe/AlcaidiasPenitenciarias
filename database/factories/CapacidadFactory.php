<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Capacidad;
use App\Models\Destino;

class CapacidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $idsDestino = Destino::select('id')->get();
        $booleans = [true, false];
        return [
            'fecha_inicio' => $this->faker->date(), 
            'cap_femenina' => $this->faker->numberBetween(0,250),
            'cap_masculina' => $this->faker->numberBetween(0,250),
            'cap_trans' => $this->faker->numberBetween(0,250),  
            'destino_id' => $this->faker->randomElement($idsDestino),
            'cap_masculina_active' => $this->faker->randomElement($booleans),
            'cap_femenina_active' => $this->faker->randomElement($booleans),
            'cap_trans_active' => $this->faker->randomElement($booleans),
        ];
    }   
 
}

