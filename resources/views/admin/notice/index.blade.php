@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.notice.index') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Notices</h4>
        <a class="btn btn-primary" href="{{route('admin.notice.create')}}">Add Notice</a>
    </div>

    <!-- Filter Section -->
    <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small mb-1">Title</label>
                <input type="text" class="form-control form-control-sm" placeholder="Title" name="title" value="{{ request('title') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label small mb-1">Category</label>
                <x-select :options="$noticeCategories" name="notice_category_id" class="form-select form-select-sm" placeholder="All Categories" :selected="request('notice_category_id')" />
            </div>
            <div class="col-md-3">
                <label class="form-label small mb-1">Status</label>
                <x-select :options="$statuses" name="status" class="form-select form-select-sm" placeholder="All Statuses" :selected="request('status')" />
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{route('admin.notice.index')}}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Document(s)/URL</th>
                    <th>Publish Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notices as $notice)
                <tr>
                    <td>{{$notice->title}}</td>
                    <td>{{$notice->noticeCategory->name}}</td>
                    <td>
                        @if($notice->isPublished())
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle me-1"></i>Published
                            </span>
                        @else
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-clock me-1"></i>Scheduled
                            </span>
                        @endif
                    </td>
                    <td class="small">
                        <a href="{{ $notice->noticeUrl() }}" target="_blank">{{$notice->url ?: $notice->documentFilename()}}</a>
                        @foreach($notice->noticeChildren as $child)
                            , <a href="{{ $child->documentUrl() }}" target="_blank">{{$child->documentFilename()}}</a>
                        @endforeach
                    </td>
                    <td>{{$notice->published_at}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.notice.edit',$notice)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.notice.destroy', $notice) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?')">
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
                    <td colspan="6" class="text-center">No notices found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $notices->withQueryString()->links() }}
    </div>
@endsection