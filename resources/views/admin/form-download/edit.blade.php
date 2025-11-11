@extends('layouts.admin')
@section('breadcrumbs')
    {{-- {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }} --}}
@endsection
@section('content')
    <h4 class="mb-4">Edit Form Download</h4>
    <div class="bg-white p-4 rounded shadow-sm">
        <form action="{{ route('admin.form-download.update', $formDownload) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $formDownload->title) }}" placeholder="Enter form title" required>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>
            
            @if($formDownload->filename)
                <div class="mb-3">
                    <label class="form-label">Current Document</label>
                    <div class="d-flex align-items-center p-2 bg-light rounded">
                        <i class="bi bi-file-earmark-pdf text-danger me-2"></i>
                        <a href="{{ $formDownload->documentUrl() }}" target="_blank" class="text-decoration-none me-2">
                            {{ $formDownload->documentFilename() }}
                        </a>
                        <span class="badge bg-success ms-auto">Current</span>
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">
                    Upload New PDF Document 
                    @if($formDownload->filename)
                        (Optional - Leave empty to keep current document)
                    @else
                        *
                    @endif
                </label>
                <input type="file" class="form-control" name="document" accept="application/pdf" @if(!$formDownload->filename) required @endif>
                <div class="form-text small text-muted">
                    <i class="bi bi-info-circle me-1"></i>
                    Please upload a PDF file (Maximum size: {{ \App\Models\FormDownload::$documentMaxSize / 1000 }}MB)
                    @if($formDownload->filename)
                        <br>Uploading a new document will replace the current one.
                    @endif
                </div>
                <span class="text-danger small">@error('document') {{ $message }} @enderror</span>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle me-1"></i>Update Form Download
                </button>
                <a href="{{ route('admin.form-download.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Back to List
                </a>
            </div>
        </form>
    </div>
@endsection