@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Create Station Judge</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.station-judge.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required>
                    <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Parent Court *</label>
                    <input type="text" class="form-control" name="parent_court" value="{{ old('parent_court') }}" required>
                    <span class="text-danger small">@error('parent_court') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">DOB</label>
                    <input type="text" class="form-control datepicker" name="dob" value="{{ old('dob') }}">
                    <span class="text-danger small">@error('dob') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stream *</label>
                    <input type="text" class="form-control" name="stream" value="{{ old('stream') }}" required>
                    <span class="text-danger small">@error('stream') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Elevation Date *</label>
                    <input type="text" class="form-control datepicker" name="elevation_date" value="{{ old('elevation_date') }}" required>
                    <span class="text-danger small">@error('elevation_date') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stationing *</label>
                    <input type="text" class="form-control" name="stationing" value="{{ old('stationing') }}" required>
                    <span class="text-danger small">@error('stationing') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo *</label>
                    <div class="imgp-preview">
                        <img src="{{ asset('images/placeholder-image.png') }}" alt="Preview" id="photo-preview">
                    </div>
                    <input type="file" class="form-control imgp-input" data-target="#photo-preview" name="photo" accept="image/*" required>
                    <span class="text-muted">Maximum file size: {{ $photoSize }} KB.</span><br>
                    <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Biography</label>
                    <textarea class="form-control" name="biography" rows="4">{{ old('biography') }}</textarea>
                    <span class="text-danger small">@error('biography') {{ $message }} @enderror</span>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.station-judge.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection