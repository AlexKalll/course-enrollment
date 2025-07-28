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
                'resources' => 'HTML5 & CSS3 Handbook, JavaScript Fundamentals eBook, Code Editor Setup Guide',
            ],
            [
                'title' => 'Advanced PHP Programming',
                'description' => 'Master PHP programming with advanced concepts, design patterns, and best practices.',
                'resources' => 'PHP 8 Documentation, Design Patterns in PHP, Laravel Framework Guide',
            ],
            [
                'title' => 'Database Design and Management',
                'description' => 'Learn how to design, implement, and manage relational databases with MySQL.',
                'resources' => 'MySQL Workbench, Database Normalization Guide, SQL Query Optimization Techniques',
            ],
            [
                'title' => 'Mobile App Development with React Native',
                'description' => 'Build cross-platform mobile applications using React Native framework.',
                'resources' => 'React Native Documentation, Expo CLI, Mobile UI/UX Design Principles',
            ],
            [
                'title' => 'DevOps and Continuous Integration',
                'description' => 'Learn modern DevOps practices including CI/CD pipelines, containerization, and cloud deployment.',
                'resources' => 'Docker Essentials, Jenkins Pipeline Tutorial, AWS/Azure Deployment Guides',
            ],
            [
                'title' => 'Data Science Fundamentals',
                'description' => 'Introduction to data analysis, visualization, and machine learning concepts.',
                'resources' => 'Python for Data Science, Jupyter Notebooks, Pandas & NumPy Libraries, Matplotlib Visualization',
            ],
            [
                'title' => 'Cybersecurity Essentials',
                'description' => 'Learn the fundamentals of network security, encryption, and ethical hacking.',
                'resources' => 'Network Security Handbook, Encryption Algorithms Guide, Penetration Testing Tools',
            ],
            [
                'title' => 'UI/UX Design Principles',
                'description' => 'Master the art of creating intuitive user interfaces and exceptional user experiences.',
                'resources' => 'Figma Design Tool, UI Component Libraries, User Research Methodologies',
            ],
            [
                'title' => 'Blockchain Development',
                'description' => 'Explore blockchain technology and learn to build decentralized applications.',
                'resources' => 'Ethereum Development Guide, Solidity Programming Language, Web3.js Library',
            ],
            [
                'title' => 'Cloud Computing with AWS',
                'description' => 'Learn to architect and deploy scalable applications on Amazon Web Services.',
                'resources' => 'AWS Console Access, S3 Storage Guide, EC2 Instance Management, Lambda Functions',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}