<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\EventCategory;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all available organizers and categories
        $organizers = Organizer::all();
        $categories = EventCategory::all();

        foreach (range(1, 6) as $index) {
            Event::create([
                'title' => 'Event ' . $index, // Example title like 'Event 1'
                'venue' => $faker->address, // Random address for venue
                'date' => $faker->date, // Random date for the event
                'start_time' => $faker->time('H:i'), // Adjusted: 24-hour format (HH:mm)
                'description' => $faker->paragraph, // Random event description
                'booking_url' => $faker->optional()->url, // Optional booking URL (nullable)
                'tags' => implode(',', $faker->words(3)), // Example tags (comma-separated)
                'organizer_id' => $organizers->random()->id, // Assign random organizer from the available organizers
                'event_category_id' => $categories->random()->id, // Assign random category from the available categories
                'active' => 1, // Set event as active
            ]);
        }
    }
}
