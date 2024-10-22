<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Amenity>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::factory(1)->create(['role' => 'agn']);

        return [
            'name' => fake()->name,
            'description' => fake()->sentence(20),
            'price' => fake()->randomFloat(2, 4000.0, 90000.0),
            'type' => fake()->randomElement(['apartment', 'house', 'penthouse']),
            'status' => fake()->randomElement(['on-sale', 'sold', 'building']),
            'agent_id' => $user->first()->id
        ];
    }
}
