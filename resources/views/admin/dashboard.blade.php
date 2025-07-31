@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3 style="margin-bottom: 20px;">Admin Dashboard</h3>
    <div class="row mb-4">
        <!-- Dashboard Stats -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Courses</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $coursesCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $usersCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Enrollments</div>
                <div class="card-body">
                    <h3 class="card-title">{{ $enrollmentsCount }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Courses -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Recent Courses</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($recentCourses as $course)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $course->title }}
                                <span class="badge badge-primary badge-pill">
                                    {{ $course->enrollments_count }} Enrollments
                                </span>
                            </li>
                        @endforeach
                        @if($recentCourses->isEmpty())
                            <li class="list-group-item">No recent courses.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Recent Users</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($recentUsers as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $user->name }} ({{ $user->email }})
                                <span class="badge badge-success badge-pill">
                                    {{ $user->enrollments_count }} Enrollments
                                </span>
                            </li>
                        @endforeach
                        @if($recentUsers->isEmpty())
                            <li class="list-group-item">No recent users.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection