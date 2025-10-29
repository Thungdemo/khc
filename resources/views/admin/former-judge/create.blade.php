@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Create Former Judge</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.former-judge.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" rrr>
                    <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date *</label>
                    <input type="text" class="form-control datepicker" name="start" value="{{ old('start') }}" rrr>
                    <span class="text-danger small">@error('start') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date *</label>
                    <input type="text" class="form-control datepicker" name="end" value="{{ old('end') }}" rrr>
                    <span class="text-danger small">@error('end') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo *</label>
                    <div class="imgp-preview">
                        <img src="{{ asset('images/placeholder-image.png') }}" alt="Preview" id="photo-preview">
                    </div>
                    <input type="file" class="form-control imgp-input" data-target="#photo-preview" name="photo" accept="image/*" rrr>
                    <span class="text-muted">Maximum file size: {{ $photoSize }} KB.</span><br>
                    <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection