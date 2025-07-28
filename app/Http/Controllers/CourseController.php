<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   public function index()
{
    $user = auth()->user();
    $enrolledCourses = $user->courses()->get(); 

    return view('dashboard', compact('enrolledCourses'));
}
    public function showAllCourses()
{
    $courses = Course::all(); 
    return view('courses.index', compact('courses'));
}
public function resources($id)
{
    $course = Course::findOrFail($id);
    return view('courses.resources', compact('course'));
}

}
