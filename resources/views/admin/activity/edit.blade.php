@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.activity.edit', $activity) }}
@endsection
@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Edit Activity</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.activity.update', $activity->id) }}" class="confirm-update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $activity->title) }}" required>
                    <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control richtext" name="description" rows="8">{{ old('description', $activity->description) }}</textarea>
                    <span class="text-danger small">@error('description') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Published At</label>
                    <input type="text" class="form-control datepicker" name="published_at" value="{{ old('published_at', $activity->published_at) }}">
                    <span class="text-danger small">@error('published_at') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <div class="imgp-preview">
                        <img src="{{ $activity->photo ? asset('storage/' . $activity->photo) : asset('images/blank-avatar.jpg') }}" alt="Preview" id="image-preview">
                    </div>
                    <input type="file" class="form-control imgp-input" data-target="#image-preview" name="image" accept="image/*">
                    <span class="text-muted">Maximum file size: {{ \App\Models\Activity::$photoSize }} KB. Leave empty to keep current image.</span><br>
                    <span class="text-danger small">@error('image') {{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.activity.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection