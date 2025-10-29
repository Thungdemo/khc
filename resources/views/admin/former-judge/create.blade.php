@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Create Former Judge</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.former-judge.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="full_name" rrr>
                <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Start Date *</label>
                <input type="text" class="form-control datepicker" name="start" rrr>
                <span class="text-danger small">@error('start') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">End Date *</label>
                <input type="text" class="form-control datepicker" name="end" rrr>
                <span class="text-danger small">@error('end') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo *</label>
                <input type="file" class="form-control" name="photo" accept="image/*" rrr>
                <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection