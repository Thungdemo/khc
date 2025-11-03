@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection
@section('content')
    <h4 class="mb-4">Create Notice</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.notice.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" placeholder="Enter notice title" rrr>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Category *</label>
                <x-select class="form-select" name="notice_category_id" placeholder="Select category" :options="$noticeCategories" rrr/>
                <span class="text-danger small">@error('notice_category_id') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="schedule" name="schedule" value="1">
                    <label class="form-check-label" for="schedule">
                        <i class="bi bi-clock me-1"></i>Schedule publish date
                    </label>
                </div>
                <div class="form-text small text-muted">
                    Check this box to set a specific publish date and time. If unchecked, the notice will be published immediately.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="text" class="form-control datetimepicker" name="published_at" placeholder="Select date and time">
                <span class="text-danger small">@error('published_at') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload PDF *</label>
                <input type="file" class="form-control" name="document" accept="application/pdf" rrr>
                <span class="text-danger small">@error('document') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection