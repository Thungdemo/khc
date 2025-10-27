@extends('layouts.admin')
@section('content')
    <h4 class="mb-4">Create Registry Official</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.registry-official.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="full_name">
                <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Designation *</label>
                <input type="text" class="form-control" name="designation">
                <span class="text-danger small">@error('designation') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">DOB</label>
                <input type="text" class="form-control datepicker" name="dob" >
                <span class="text-danger small">@error('dob') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Qualification</label>
                <input type="text" class="form-control" name="qualification">
                <span class="text-danger small">@error('qualification') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone No</label>
                <input type="text" class="form-control" name="phone_no" maxlength="10">
                <span class="text-danger small">@error('phone_no') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
                <span class="text-danger small">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Photo *</label>
                <input type="file" class="form-control" name="photo" accept="image/*">
                <span class="text-danger small">@error('photo') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection