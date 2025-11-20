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
                <label class="form-label">Title *</label>
                <input type="text" class="form-control" name="title" placeholder="Enter notice title"
                       value="{{ old('title', $notice->title) }}" required>
                <span class="text-danger small">@error('title') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Category *</label>
                <select class="form-select" name="notice_category_id" required id="notice_category_id">
                    <option value="">Select category</option>
                    @foreach ($noticeCategories as $id => $name)
                        <option value="{{ $id }}" @selected(old('notice_category_id', $notice->notice_category_id) == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                <span class="text-danger small">@error('notice_category_id') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Subcategory</label>
                <x-select class="form-select" name="notice_subcategory_id" placeholder="Select Subcategory" :options="$noticeSubcategories" :selected="old('notice_subcategory_id', $notice->notice_subcategory_id)" id="notice_subcategory_id" />
                <span class="text-danger small">@error('notice_subcategory_id') {{ $message }} @enderror</span>
            </div>

            <div class="mb-3">
                <label class="form-label">Publish Date *</label>
                <input type="text" class="form-control datetimepicker" name="published_at"
                       value="{{ old('published_at', $notice->published_at) }}" required>
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

            <div class="mb-4">
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="addMoreDocuments" name="more_documents" @checked(old('more_documents',$notice->noticeChildren->count()))>
                    <label class="form-check-label" for="addMoreDocuments">
                        Add more documents
                    </label>
                </div>
                
                <div id="documentsSection" @class(['d-none' => !old('more_documents', $notice->noticeChildren->count())])>
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
                                    <th width="40%">Document Title *</th>
                                    <th width="45%">Document File *</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="documentsTableBody">
                                @if($errors->any())
                                    @foreach(old('notice_children', []) as $index => $item)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="notice_children[{{ $index }}][title]" placeholder="Enter document title" value="{{ $item['title'] }}">
                                            <span class="text-danger small">@error('notice_children.'.$index.'.title') {{ $message }} @enderror</span>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="notice_children[{{ $index }}][document]" accept="application/pdf">
                                            <span class="text-danger small">@error('notice_children.'.$index.'.document') {{ $message }} @enderror</span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-row">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    @foreach($notice->noticeChildren as $index => $child)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="notice_children[{{ $child->id }}][title]" placeholder="Enter document title" value="{{ $child->title }}">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="notice_children[{{ $child->id }}][document]" accept="application/pdf">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-danger btn-sm remove-row">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                <!-- Dynamic rows will be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.notice.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection
@push('scripts')
@vite('resources/js/admin/notice.js')
@endpush