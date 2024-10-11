<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organizer;
use Faker\Factory as Faker;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();  // Instantiate Faker

        // Create 5 dummy organizers using a loop
        foreach (range(1, 5) as $index) {
            Organizer::create([
                'name' => 'Organizer ' . $index,
                'description' => $faker->text(255), // Random description
                'facebook_link' => "http://m.facebook.com/dummy",  // Random Facebook link
                'x_link' => "http://x.com/dummy",  // Random X (formerly Twitter) link
                'website_link' => "http://dummy.com",  // Random Website link
                'active' => 1,  // Active status
            ]);
        }
    }
}
