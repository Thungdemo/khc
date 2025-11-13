@extends('layouts.admin')
{{-- @section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection --}}
@section('content')
    <h4 class="mb-4">Edit Advocate General</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.advocate-general.update', $advocateGeneral->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" class="form-control" name="full_name" placeholder="Enter full name"
                       value="{{ old('full_name', $advocateGeneral->full_name) }}">
                <span class="text-danger small">@error('full_name') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Category *</label>
                <x-select :options="$agCategories" name="ag_category_id" class="form-select" placeholder="Select category" :selected="old('ag_category_id', $advocateGeneral->ag_category_id)" />
                <span class="text-danger small">@error('ag_category_id') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Date of Joining *</label>
                <input type="text" class="form-control datepicker" name="doj"
                       value="{{ old('doj', $advocateGeneral->doj) }}">
                <span class="text-danger small">@error('doj') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Served Till</label>
                <input type="text" class="form-control datepicker" name="served_till"
                       value="{{ old('served_till', $advocateGeneral->served_till) }}">
                <span class="text-danger small">@error('served_till') {{ $message }} @enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.advocate-general.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection