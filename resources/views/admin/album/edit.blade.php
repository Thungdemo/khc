@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.album.edit', $album) }}
@endsection
@section('content')
    <h4 class="mb-4">Edit Album</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.album.update', $album) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $album->title) }}" placeholder="Enter album title" required>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4" placeholder="Enter album description">{{ old('description', $album->description) }}</textarea>
                <div class="form-text">Optional: Provide a brief description of this album</div>
                <span class="text-danger small">@error('description') {{ $message }} @enderror</span>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
@endsection