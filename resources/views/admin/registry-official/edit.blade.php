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
                <label class="form-label">Level *</label>
                <input type="text" class="form-control" name="level" value="{{ old('level', $registryOfficial->level) }}">
                <span class="text-danger small">@error('level') {{ $message }} @enderror</span>
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
                <div class="imgp-preview">
                    <img src="{{ $registryOfficial->photoUrl() }}" alt="Preview" id="photo-preview">
                </div>
                <input type="file" class="form-control imgp-input" data-target="#photo-preview" name="photo" accept="image/*">
                <span class="text-muted">Maximum file size: {{ $photoSize }} KB. Leave empty to keep current photo.</span><br>
                <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection