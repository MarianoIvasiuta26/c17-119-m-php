<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal' => $this->faker->unique()->randomElement(['Perro', 'Gato', 'Conejo', 'Pez', 'Loro', 'Reptil', 'Roedor', 'Tortuga'])
        ];
    }
}
