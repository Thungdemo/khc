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
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter notice title">
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="notice_category_id">
                    <option value="">Select category</option>
                    @foreach ($noticeCategories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <span class="text-danger small">@error('notice_category_id') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Publish Date</label>
                <input type="text" class="form-control datetimepicker" name="published_at" >
                <span class="text-danger small">@error('published_at') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload PDF</label>
                <input type="file" class="form-control" name="document" accept="application/pdf">
                <span class="text-danger small">@error('document') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection