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

            <!-- Additional Documents Section -->
            <div class="mb-4">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="addMoreDocuments" name="add_more_documents">
                    <label class="form-check-label" for="addMoreDocuments">
                        Add more documents
                    </label>
                </div>
                
                <div id="documentsSection" class="d-none">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="form-label mb-0">Additional Documents</label>
                        <button type="button" class="btn btn-outline-primary btn-sm" id="addDocumentRow">
                            <i class="bi bi-plus-circle me-1"></i>Add Document
                        </button>
                    </div>
                
                    <div class="table-responsive">
                        <table class="table table-bordered" id="documentsTable">
                            <thead class="table-light">
                                <tr>
                                    <th width="40%">Document Title</th>
                                    <th width="45%">Document File</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="documentsTableBody">
                                <!-- Dynamic rows will be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
@push('scripts')
@vite('resources/js/admin/notice.js')
@endpush