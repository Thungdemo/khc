@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Edit Former Judge</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.former-judge.update', $formerJudge) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name', $formerJudge->full_name) }}" required>
                    <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date *</label>
                    <input type="text" class="form-control datepicker" name="start" value="{{ old('start', $formerJudge->start) }}" required>
                    <span class="text-danger small">@error('start') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="text" class="form-control datepicker" name="end" value="{{ old('end', $formerJudge->end) }}">
                    <span class="text-danger small">@error('end') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <div class="imgp-preview">
                        <img src="{{ $formerJudge->photoUrl() }}" alt="Preview" id="photo-preview">
                    </div>
                    <input type="file" class="form-control imgp-input" data-target="#photo-preview" name="photo" accept="image/*">
                    <span class="text-muted">Maximum file size: {{ $photoSize }} KB. Leave empty to keep current photo.</span><br>
                    <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.former-judge.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection