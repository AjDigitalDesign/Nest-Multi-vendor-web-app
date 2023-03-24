<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'profile_image' => fake()->imageUrl('60', '60'),
            'street_address' => fake()->streetAddress(),
            'city' => fake('en_US')->city(),
            'state' => fake('en_US')->state(),
            'zipcode' => fake()->postcode(),
            'phone_number' => fake()->phoneNumber(),
            'country' => fake()->country()

        ];
    }
}
