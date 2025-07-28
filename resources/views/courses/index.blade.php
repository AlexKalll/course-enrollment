<!DOCTYPE html>
<html>
<head>
    <title>Available Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Available Courses</h1>
        @auth
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-success me-2">Go to Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @endauth
    </div>

    @if($courses->isEmpty())
        <p>No courses available at the moment.</p>
    @else
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p><strong>Price:</strong> {{ $course->price }} ETB</p>

                            @auth
                                <form method="POST" action="{{ route('courses.enroll', $course->id) }}">
                                    @csrf
                                    <button class="btn btn-success">Enroll</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Login to Enroll</a>
                            @endauth

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
</body>
</html>
