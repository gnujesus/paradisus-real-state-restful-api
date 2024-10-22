<?php

namespace Database\Factories;

use App\Models\User; // Ensure you have this import for the User model
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class AmenityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a user with the role 'agn'
        $user = User::factory(1)->create(['role' => 'agn']);

        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(20), // Fix typo here
            'agent_id' => $user->first()->id // Assign the ID of the created user
        ];
    }
}
