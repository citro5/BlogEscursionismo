<?php

namespace Database\Factories;

use App\Models\GruppoMontuoso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GruppoMontuoso>
 */
class GruppoMontuosoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = GruppoMontuoso::class; 
    public function definition()
    {
        return [
            'nome'=> $this->faker->randomElement(['Alpi Retiche','Bernina','Ortles-Cevedale','Adamello','Alpi Orobie']),
        ];
    }
}
