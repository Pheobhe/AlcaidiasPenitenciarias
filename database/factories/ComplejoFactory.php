<?php

namespace Database\Factories;
use App\Models\Complejo;
use App\Models\Destino;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complejo>
 */
class ComplejoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'nombre' => $this->faker->sentence(2)
            
        ];
    }
}
