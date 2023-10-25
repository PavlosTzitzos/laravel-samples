<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'testuser1',
            'email' => 'testuser1@example.com',
            'password' => bcrypt('testuser1'),
            'role' => 0,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testuser2',
            'email' => 'testuser2@example.com',
            'password' => bcrypt('testuser2'),
            'role' => 0,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testeditor2',
            'email' => 'testeditor2@example.com',
            'password' => bcrypt('testeditor2'),
            'role' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'underground1003@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 2
        ]);

        // \App\Models\Producer::factory()->create([
        //     'first_name' => 'test',
        //     'second_name' => 'test',
        // ]);

        // \App\Models\Producer::factory()->create([
        //     'first_name' => 'user2',
        //     'second_name' => 'user2',
        // ]);
    }
}
