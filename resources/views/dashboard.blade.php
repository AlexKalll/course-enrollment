<!DOCTYPE html>
<html>
<head>
    <title>Your Enrolled Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="notification" class="alert alert-success" style="display:none; position:fixed; top:20px; right:20px; z-index:1000;"></div>
<div class="container mt-5">
    <h2 class="mb-4">Welcome, {{ auth()->user()->name }}</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Your Enrolled Courses</h4>
    <div>
        <a href="{{ route('home') }}" class="btn btn-primary me-2">Browse Courses</a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

    <div class="row">
        @forelse ($enrolledCourses as $course)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('courses.resources', $course->id) }}" class="btn btn-primary">Continue Learning</a>
                            <form method="POST" action="{{ route('courses.unenroll', $course->id) }}" class="d-inline" data-course-title="{{ $course->name }}">
                                @csrf
                                <button type="submit" class="btn btn-warning">Unenroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>You haven't enrolled in any courses yet.</p>
        @endforelse
    </div>
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
                        message = `Successfully unenrolled for the ${courseTitle} course`;
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
