@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Course Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $course->title }}
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $course->description }}</p>
            <p><strong>Price:</strong> {{ $course->price }}</p>
            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');">Delete</button>
            </form>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">Back to Courses</a>
        </div>
    </div>
</div>
@endsection