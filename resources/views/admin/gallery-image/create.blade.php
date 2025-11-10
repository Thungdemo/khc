@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Create Gallery Image</h4>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.gallery-image.store') }}" class="confirm-submit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Image *</label>
                            <div class="imgp-preview">
                                <img id="image-preview" style="max-height: 200px;">
                            </div>
                            <input type="file" class="form-control imgp-input" data-target="#image-preview" name="filename" accept="image/*" required>
                            <span class="text-danger small">@error('filename') {{ $message }} @enderror</span>
                            <span class="form-text small text-muted">Allowed files: jpg, png, webp. Max size: {{ $maxFileSize }} KB</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" rrr>
                            <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection