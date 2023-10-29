<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Facades\Label84\HoursHelper\HoursHelper; // used for hour intervals
//use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Seed Users table */

        \App\Models\User::factory()->create([
            'name' => 'testuser1',
            'email' => 'testuser1@example.com',
            'password' => bcrypt('testuser1'),
            'role' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@example.com',
            'password' => bcrypt('12345678'),
            'role' => 'editor',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'underground1003@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        /* Seed Shows table : */

        \App\Models\Show::factory()->create([
            'show_name' => 'Underground Playlist',
            'show_description' => 'A playlist created from the web radio\'s producers. ',
            'show_logo' => 'C:\Users\pavlos\source\repos\laravel-samples\undergroundwebsite-vsc\my_first_app\resources\img\logo.png',
        ]);

        /* Seed Producers */
        // Create 25 data of the Producer Model
        $producers = \App\Models\Producer::factory()->count(25)->create();

        
        /* Many to Many Relationship AND Shows*/

        \App\Models\Show::factory()
            ->count(10)
            ->hasAttached($producers)
            ->create();
        
        /*Seed Program Table */
        $hours = HoursHelper::create('00:00','24:00', 120);
        \App\Models\Program::factory()->create([
            'program_weekday' => fake()->dayOfWeek(),
            'show_start_time' => $hours[0],
            'show_end_time' => $hours[1],
            'show_id' => 1,
        ]);
        \App\Models\Program::factory()->create([
            'program_weekday' => fake()->dayOfWeek(),
            'show_start_time' => $hours[2],
            'show_end_time' => $hours[3],
            'show_id' => 2,
        ]);
        \App\Models\Program::factory()->create([
            'program_weekday' => fake()->dayOfWeek(),
            'show_start_time' => $hours[4],
            'show_end_time' => $hours[5],
            'show_id' => 3,
        ]);
        
        \App\Models\Program::factory()->create([
            'program_weekday' => fake()->dayOfWeek(),
            'show_start_time' => $hours[6],
            'show_end_time' => $hours[7],
            'show_id' => 4,
        ]);
        \App\Models\Program::factory()->create([
            'program_weekday' => fake()->dayOfWeek(),
            'show_start_time' => $hours[8],
            'show_end_time' => $hours[9],
            'show_id' => 5,
        ]);

        /**
         * Seed Current Show Table with Show with id 1 
         * It is the default playlist - Underground Web Radio Playlist
         */
        \App\Models\CurrentShow::factory()->create([
            'show_id' => 1,
            'priority' =>0
        ]);

    }
}
