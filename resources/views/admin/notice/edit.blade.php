@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection
@section('content')
    <h4 class="mb-4">Edit Notice</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter notice title"
                       value="{{ old('title', $notice->title) }}">
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="notice_category_id">
                    <option value="">Select category</option>
                    @foreach ($noticeCategories as $id => $name)
                        <option value="{{ $id }}" @selected(old('notice_category_id', $notice->notice_category_id) == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                <span class="text-danger small">@error('notice_category_id') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="text" class="form-control datetimepicker" name="published_at"
                       value="{{ old('published_at', $notice->published_at) }}">
                <span class="text-danger small">@error('published_at') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload PDF</label>
                @if(!empty($notice->document))
                    <div class="mb-2">
                        <a href="{{ asset('storage/'.$notice->document) }}" target="_blank" class="d-inline-block">
                            View current document
                        </a>
                    </div>
                @endif
                <input type="file" class="form-control" name="document" accept="application/pdf">
                <small class="text-muted">Upload a new PDF to replace the existing one.</small>
                <span class="text-danger small d-block mt-1">@error('document') {{ $message }} @enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.notice.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection