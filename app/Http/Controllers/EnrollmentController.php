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
            return redirect()->route('courses.resources', $course->id)->with('message', 'You are already enrolled in this course. Continue learning!');
        }

        $user->courses()->attach($course->id);

        return back()->with('message', 'Enrolled successfully!');
    }

    public function unenroll(Course $course)
    {
        $user = auth()->user();

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            $user->courses()->detach($course->id);
            return back()->with('message', 'Unenrolled successfully!');
        }

        return back()->with('message', 'You are not enrolled in this course.');
    }
    
}
