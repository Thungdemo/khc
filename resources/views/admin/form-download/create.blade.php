@extends('layouts.admin')
@section('breadcrumbs')
    {{-- {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }} --}}
@endsection
@section('content')
    <h4 class="mb-4">Create Form Download</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.form-download.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter form title" required>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>
            <div class="mb-3">
                <label class="form-label">Upload PDF Document *</label>
                <input type="file" class="form-control" name="document" accept="application/pdf" required>
                <div class="form-text small text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Please upload a PDF file (Maximum size: {{ \App\Models\FormDownload::$documentMaxSize / 1000 }}MB)
                </div>
                <span class="text-danger small">@error('document') {{ $message }} @enderror</span>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>Save Form Download
                </button>
                <a href="{{ route('admin.form-download.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Back to List
                </a>
            </div>
        </form>
    </div>
@endsection