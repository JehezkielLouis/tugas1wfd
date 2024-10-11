<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_categories')->insert([
            ['name' => 'Expo', 'active' => 1],
            ['name' => 'Concert', 'active' => 1],
            ['name' => 'Conference', 'active' => 1],
        ]);
        
    }
}
