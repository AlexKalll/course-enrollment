<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => '123456',
        ]);
        
        // Call seeders
        $this->call([
            AdminSeeder::class,        // New admin table seeder
            EnhancedCourseSeeder::class, // Enhanced course seeder with multiple courses
        ]);
    }
}
