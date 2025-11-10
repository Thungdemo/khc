@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.calendar.edit') }}
@endsection
@section('content')
    <h4 class="mb-4">Edit Calendar Event</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.calendar.update', $calendar) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $calendar->title) }}" placeholder="Enter event title" required>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Start Date *</label>
                        <input type="date" class="form-control datepicker" name="start_date" value="{{ old('start_date', $calendar->start_date) }}" required>
                        <span class="text-danger small">@error('start_date') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control datepicker" name="end_date" value="{{ old('end_date', $calendar->end_date) }}">
                        <div class="form-text small text-muted">Leave empty for single day events</div>
                        <span class="text-danger small">@error('end_date') {{ $message }} @enderror</span>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Type *</label>
                <select class="form-select" name="type" required>
                    <option value="">Select event type</option>
                    <option value="national" {{ old('type', $calendar->type) == 'national' ? 'selected' : '' }}>National Holiday</option>
                    <option value="restricted" {{ old('type', $calendar->type) == 'restricted' ? 'selected' : '' }}>Restricted Holiday</option>
                </select>
                <div class="form-text small text-muted">
                    <strong>National:</strong> Public holidays observed by all<br>
                    <strong>Restricted:</strong> Optional holidays with limited observance
                </div>
                <span class="text-danger small">@error('type') {{ $message }} @enderror</span>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Event</button>
                <a href="{{ route('admin.calendar.index') }}" class="btn btn-outline-secondary">Back to List</a>
            </div>
        </form>
    </div>
@endsection