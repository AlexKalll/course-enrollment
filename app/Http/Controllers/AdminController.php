<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $coursesCount = Course::count();
        $usersCount = User::where('is_admin', false)->count();
        $enrollmentsCount = Enrollment::count();
        
        $recentCourses = Course::withCount('enrollments')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $recentUsers = User::where('is_admin', false)
            ->withCount('enrollments')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('admin.dashboard', compact(
            'coursesCount', 
            'usersCount', 
            'enrollmentsCount', 
            'recentCourses', 
            'recentUsers'
        ));
    }
    
    // Course Management
    public function courses()
    {
        $courses = Course::withCount('enrollments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.courses.index', compact('courses'));
    }
    
    public function createCourse()
    {
        return view('admin.courses.create');
    }
    
    public function storeCourse(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resources' => 'nullable|string',
        ]);
        
        Course::create($validated);
        
        return redirect()->route('admin.courses')->with('success', 'Course created successfully!');
    }
    
    public function editCourse(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }
    
    public function updateCourse(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'resources' => 'nullable|string',
        ]);
        
        $course->update($validated);
        
        return redirect()->route('admin.courses')->with('success', 'Course updated successfully!');
    }
    
    public function deleteCourse(Course $course)
    {
        // Delete all enrollments related to this course
        $course->enrollments()->delete();
        
        // Delete the course
        $course->delete();
        
        return redirect()->route('admin.courses')->with('success', 'Course deleted successfully!');
    }
    
    // User Management
    public function users()
    {
        $users = User::withCount('enrollments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.users.index', compact('users'));
    }
    
    public function createUser()
    {
        return view('admin.users.create');
    }
    
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);
        
        // Hash the password
        $validated['password'] = Hash::make($validated['password']);
        
        // Set is_admin to false if not provided
        $validated['is_admin'] = $request->has('is_admin') ? true : false;
        
        User::create($validated);
        
        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }
    
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'is_admin' => 'sometimes|boolean',
        ]);
        
        // Only update password if provided
        if (!empty($request->password)) {
            $validated['password'] = Hash::make($request->password);
        }
        
        // Set is_admin to false if not provided
        $validated['is_admin'] = $request->has('is_admin') ? true : false;
        
        $user->update($validated);
        
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }
    
    public function deleteUser(User $user)
    {
        // Prevent deleting yourself
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users')
                ->with('error', 'You cannot delete your own account!');
        }
        
        // Delete all enrollments related to this user
        $user->enrollments()->delete();
        
        // Delete the user
        $user->delete();
        
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
    
    // Enrollment Management
    public function enrollments()
    {
        $enrollments = Enrollment::with(['user', 'course'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.enrollments.index', compact('enrollments'));
    }
    
    public function deleteEnrollment(Enrollment $enrollment)
    {
        $enrollment->delete();
        
        return redirect()->route('admin.enrollments')->with('success', 'Enrollment deleted successfully!');
    }
}