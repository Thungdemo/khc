@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Notices</h4>
        <a class="btn btn-primary btn-sm" href="{{route('admin.notice.create')}}">Add Notice</a>
    </div>

    <!-- Filter Section -->
    <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small mb-1">Title</label>
                <input type="text" class="form-control form-control-sm" placeholder="Title" name="title">
            </div>
            <div class="col-md-3">
                <label class="form-label small mb-1">Category</label>
                <x-select :options="$noticeCategories" name="notice_category_id" class="form-select form-select-sm" placeholder="All Categories" :selected="request('notice_category_id')" />
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{route('admin.notice.index')}}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Document</th>
                    <th>Publish Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($notices as $notice)
                    <td>{{$notice->title}}</td>
                    <td>{{$notice->noticeCategory->name}}</td>
                    <td>
                        <a href="{{ $notice->documentUrl() }}" target="_blank">{{$notice->documentFilename()}}</a>
                    </td>
                    <td>{{$notice->published_at}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
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
                    <td colspan="5" class="text-center">No notices found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $notices->withQueryString()->links() }}
    </div>
@endsection