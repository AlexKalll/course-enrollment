<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'title' => 'Introduction to Laravel',
            'description' => 'Learn the basics of Laravel Framework.'
        ]);

        Course::create([
            'title' => 'PHP Basics',
            'description' => 'Start your PHP journey with fundamental concepts.'
        ]);
    }
}

