@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Edit Legal Committee Member</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.legal-committee.update', $legalCommittee) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Full Name *</label>
                    <input type="text" class="form-control" name="full_name" value="{{ old('full_name', $legalCommittee->full_name) }}" required>
                    <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Designation *</label>
                    <input type="text" class="form-control" name="designation" value="{{ old('designation', $legalCommittee->designation) }}" required>
                    <span class="text-danger small">@error('designation') {{ $message }} @enderror</span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    @if($legalCommittee->photo)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $legalCommittee->photo) }}" alt="Current Photo" class="img-thumbnail" style="max-height: 150px;">
                            <p class="text-muted small">Current photo</p>
                        </div>
                    @endif
                    <div class="imgp-preview">
                        <img src="{{ $legalCommittee->photo ? asset('storage/' . $legalCommittee->photo) : asset('images/placeholder-image.png') }}" alt="Preview" id="photo-preview">
                    </div>
                    <input type="file" class="form-control imgp-input" data-target="#photo-preview" name="photo" accept="image/*">
                    <span class="text-muted">Maximum file size: {{ $photoSize }} KB. Leave empty to keep current photo.</span><br>
                    <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.legal-committee.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection