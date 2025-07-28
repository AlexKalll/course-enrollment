<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Course $course)
    {
        $user = auth()->user();

      
        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return back()->with('message', 'Already enrolled in this course.');
        }

        $user->courses()->attach($course->id);

        return back()->with('message', 'Enrolled successfully!');
    }
}
