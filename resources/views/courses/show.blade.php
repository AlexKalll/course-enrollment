<html>
<head>
    <title>{{ $course->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $course->title }}</h1>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Courses</a>
    </div>
<div class="container">
    <h1>{{ $course->title }}</h1>
    <p>{{ $course->description }}</p>
    <p>Instructor: {{ $course->instructor }}</p>
    <p>Duration: {{ $course->duration }}</p>
    <p>Price: ${{ $course->price }}</p>

    <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Enroll</button>
    </form>
</div>
</body>
</html>