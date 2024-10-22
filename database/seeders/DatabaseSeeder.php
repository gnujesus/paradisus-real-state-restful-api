<?php

namespace Database\Seeders;

use App\Models\AmenityProperty;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Amenity;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jon Doe',
            'email' => 'jondoe@example.com',
            'role' => 'adm',
        ]);

        $users = User::factory()->count(10)->create();

        $properties = Property::factory(5)->for($users->random(), 'agent')->create();
        $amenities = Amenity::factory(5)->for($users->random(), 'agent')->create();

        foreach ($properties as $property) {
            $property->amenities()->attach($amenities->random(2));
        }

    }
}
