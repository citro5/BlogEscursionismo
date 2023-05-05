<?php

namespace Database\Factories;

use App\Models\Escursione;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Escursione>
 */
class EscursioneFactory extends Factory
{
    protected $model = Escursione::class;  
     public function definition()
    {
            return [
                'titolo' => $this->faker->randomElement(['Monte Adamello', 'Pian della regina', 'Monte A', 'Monte b', 'Monte c','Monte d','Monte e','Monte f']),  
            ];
    }
}
