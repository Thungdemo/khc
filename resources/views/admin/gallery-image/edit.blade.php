@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.gallery-image.edit', $galleryImage ?? $registryOfficial ?? null) }}
@endsection
@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Edit Registry Official</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.registry-official.update', $registryOfficial->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="full_name" value="{{ old('full_name', $registryOfficial->full_name) }}">
                <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Designation *</label>
                <input type="text" class="form-control" name="designation" value="{{ old('designation', $registryOfficial->designation) }}">
                <span class="text-danger small">@error('designation') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">DOB</label>
                <input type="text" class="form-control datepicker" name="dob" value="{{ old('dob', $registryOfficial->dob) }}">
                <span class="text-danger small">@error('dob') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Qualification</label>
                <input type="text" class="form-control" name="qualification" value="{{ old('qualification', $registryOfficial->qualification) }}">
                <span class="text-danger small">@error('qualification') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone No</label>
                <input type="text" class="form-control" name="phone_no" maxlength="10" value="{{ old('phone_no', $registryOfficial->phone_no) }}">
                <span class="text-danger small">@error('phone_no') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email', $registryOfficial->email) }}">
                <span class="text-danger small">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo</label>
                @if($registryOfficial->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $registryOfficial->photo) }}" alt="Current Photo" class="img-thumbnail" style="max-height: 100px;">
                    </div>
                @endif
                <input type="file" class="form-control" name="photo" accept="image/*">
                <small class="form-text text-muted">Leave empty to keep current photo</small>
                <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection