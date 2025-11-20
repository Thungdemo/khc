@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.registry-official.index') }}
@endsection
@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Registry Officials</h4>
        <a class="btn btn-primary" href="{{route('admin.registry-official.create')}}">Add</a>
    </div>

    <!-- Filter Section -->
    {{-- <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small mb-1">Title</label>
                <input type="text" class="form-control form-control-sm" placeholder="Title" name="title">
            </div>
            <div class="col-md-3">
                <label class="form-label small mb-1">Category</label>
                <x-select :options="$registryOfficialCategories" name="notice_category_id" class="form-select form-select-sm" placeholder="All Categories" :selected="request('notice_category_id')" />
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{route('admin.registry-official.index')}}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div> --}}

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>DOB</th>
                    <th>Qualification</th>
                    <th>Level</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registryOfficials as $registryOfficial)
                    <td>{{$registryOfficial->full_name}}</td>
                    <td>{{$registryOfficial->designation}}</td>
                    <td>{{$registryOfficial->dob}}</td>
                    <td>{{$registryOfficial->qualification}}</td>
                    <td>{{$registryOfficial->level}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.registry-official.edit',$registryOfficial)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.registry-official.destroy', $registryOfficial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
                    <td colspan="5" class="text-center">No records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $registryOfficials->withQueryString()->links() }}
    </div>
@endsection