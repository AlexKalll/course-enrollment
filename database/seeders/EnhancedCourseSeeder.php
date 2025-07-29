<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class EnhancedCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Introduction to Web Development',
                'description' => 'Learn the basics of HTML, CSS, and JavaScript to build modern websites.',
                'price' => 49.99,
            ],
            [
                'title' => 'Advanced PHP Programming',
                'description' => 'Master PHP programming with advanced concepts, design patterns, and best practices.',
                'price' => 59.99,
            ],
            [
                'title' => 'Database Design and Management',
                'description' => 'Learn how to design, implement, and manage relational databases with MySQL.',
                'price' => 39.99,
            ],
            [
                'title' => 'Mobile App Development with React Native',
                'description' => 'Build cross-platform mobile applications using React Native framework.',
                'price' => 69.99,
            ],
            [
                'title' => 'DevOps and Continuous Integration',
                'description' => 'Learn modern DevOps practices including CI/CD pipelines, containerization, and cloud deployment.',
                'price' => 79.99,
            ],
            [
                'title' => 'Data Science Fundamentals',
                'description' => 'Introduction to data analysis, visualization, and machine learning concepts.',
                'price' => 89.99,
            ],
            [
                'title' => 'Cybersecurity Essentials',
                'description' => 'Learn the fundamentals of network security, encryption, and ethical hacking.',
                'price' => 74.99,
            ],
            [
                'title' => 'UI/UX Design Principles',
                'description' => 'Master the art of creating intuitive user interfaces and exceptional user experiences.',
                'price' => 44.99,
            ],
            [
                'title' => 'Blockchain Development',
                'description' => 'Explore blockchain technology and learn to build decentralized applications.',
                'price' => 99.99,
            ],
            [
                'title' => 'Cloud Computing with AWS',
                'description' => 'Learn to architect and deploy scalable applications on Amazon Web Services.',
                'price' => 84.99,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}