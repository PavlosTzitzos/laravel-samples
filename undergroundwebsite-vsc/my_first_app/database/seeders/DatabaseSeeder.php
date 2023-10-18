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
            'password' => 'testuser1'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testuser2',
            'email' => 'testuser2@example.com',
            'password' => 'testuser2'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'underground1003@gmail.com',
            'password' => '12345678'
        ]);
    }
}
