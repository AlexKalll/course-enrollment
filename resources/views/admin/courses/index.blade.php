@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Course Management</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                
                <th>Price</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td><a href="{{ route('admin.courses.show', $course->id) }}">{{ $course->title }}</a></td>
                
                            <td>{{ $course->price }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection