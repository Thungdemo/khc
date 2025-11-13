@extends('layouts.admin')
{{-- @section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection --}}
@section('content')
    <h4 class="mb-4">Create Advocate General</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.advocate-general.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="full_name" placeholder="Enter full name" value="{{ old('full_name') }}" required>
                <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Category *</label>
                <x-select :options="$agCategories" name="ag_category_id" class="form-select" placeholder="Select category" :selected="old('ag_category_id')" required/>
                <span class="text-danger small">@error('ag_category_id') {{ $message }} @enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Date of Joining *</label>
                <input type="text" class="form-control datepicker" name="doj" value="{{ old('doj') }}" required>
                <span class="text-danger small">@error('doj') {{ $message }} @enderror</span>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Served Till *</label>
                <input type="text" class="form-control datepicker" name="served_till" value="{{ old('served_till') }}" required>
                <span class="text-danger small">@error('served_till') {{ $message }} @enderror</span>
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('admin.advocate-general.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
@endsection