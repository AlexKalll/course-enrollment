<!DOCTYPE html>
<html>
<head>
    <title>{{ $course->name }} - Resources</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>{{ $course->name }}</h2>
    <p>{{ $course->description }}</p>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
</div>
</body>
</html>
