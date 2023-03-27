<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['Nike','Prada', 'New Balance', 'Adidas', 'Fila']),
            'image' => fake()->imageUrl('65', '65'),
            'description' => fake()->paragraph('3')
        ];
    }
}
