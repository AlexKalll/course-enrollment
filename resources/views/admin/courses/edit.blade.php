@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Course</h1>
    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $course->description }}</textarea>
        </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $course->price) }}" step="0.01" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection