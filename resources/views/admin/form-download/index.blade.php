@extends('layouts.admin')
@section('breadcrumbs')
    {{-- {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.form-download.index') }} --}}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Form Downloads</h4>
        <a class="btn btn-primary" href="{{route('admin.form-download.create')}}">Add Form Download</a>
    </div>

    <!-- Filter Section -->
    <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-md-6">
                <label class="form-label small mb-1">Title</label>
                <input type="text" class="form-control form-control-sm" placeholder="Title" name="title" value="{{ request('title') }}">
            </div>
            <div class="col-md-6 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{route('admin.form-download.index')}}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Document</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($formDownloads as $formDownload)
                <tr>
                    <td>{{$formDownload->title}}</td>
                    <td>
                        @if($formDownload->filename)
                            <a href="{{ $formDownload->documentUrl() }}" target="_blank">
                                <i class="bi bi-file-earmark-pdf me-1"></i>
                                {{$formDownload->documentFilename()}}
                            </a>
                        @else
                            <span class="text-muted">No document</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.form-download.edit',$formDownload)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.form-download.destroy', $formDownload) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this form download?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No form downloads found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $formDownloads->withQueryString()->links() }}
    </div>
@endsection