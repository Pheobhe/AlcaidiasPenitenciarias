<?php

namespace Database\Factories;

use App\Models\ValorConsolidado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ValorConsolidado>
 */
class ValorConsolidadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           // "id" => ValorConsolidado::factory(),
            'total' => $this->faker->randomNumber(), 
            'categoria' => $this->faker->sentence(2), 
            'cantFem'=> $this->faker->numberBetween(0,250), 
            'cantMasc'=> $this->faker->numberBetween(0,250),
            'cantTrans' => $this->faker->numberBetween(0,250), 
            
        ];
    }
}
