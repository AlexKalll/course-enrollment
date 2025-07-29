<!DOCTYPE html>
<html>
<head>
    <title>Available Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="notification" class="alert alert-success" style="display:none; position:fixed; top:20px; right:20px; z-index:1000;"></div>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Available Courses</h1>
        @auth
            <div>
                 <h3>Welcome, {{ auth()->user()->name }}!</h3>
                <a href="{{ route('dashboard') }}" class="btn btn-success me-2">Go to Your Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @else
            <div>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
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
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p><strong>Price:</strong> {{ $course->price }} ETB</p>

                            @auth
                                @auth
                                    @if(auth()->user()->courses->contains($course->id))
                                         <a href="{{ route('courses.resources', $course->id) }}" class="btn btn-info">Continue Learning</a>
                                         <form method="POST" action="{{ route('courses.unenroll', $course->id) }}" class="d-inline" data-course-title="{{ $course->title }}">
                                             @csrf
                                             <button type="submit" class="btn btn-warning">Unenroll</button>
                                         </form>
                                     @else
                                        <form method="POST" action="{{ route('courses.enroll', $course->id) }}" data-course-title="{{ $course->title }}">
                                            @csrf
                                            <button class="btn btn-success">Enroll</button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Login to Enroll</a>
                                @endauth
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const notification = document.getElementById('notification');

            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function (event) {
                    // Prevent default form submission to handle with AJAX or custom logic if needed
                    // event.preventDefault();

                    let message = '';
                    const courseTitle = form.dataset.courseTitle;
                    if (form.action.includes('unenroll')) {
                        message = `Successfully unerolled for the ${courseTitle} course!`;
                    } else if(form.action.includes('enroll')) {
                        message = `Successfully enrolled in the ${courseTitle} course!`;
                    }  

                    if (message) {
                        notification.textContent = message;
                        notification.style.display = 'block';
                        setTimeout(() => {
                            notification.style.display = 'none';
                        }, 2000);
                    }
                });
            });
        });
    </script>
</body>
</html>
