@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Activities</h4>
        <a class="btn btn-primary" href="{{route('admin.activity.create')}}">Add</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Published At</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activities as $activity)
                <tr>
                    <td>{{$activity->title}}</td>
                    <td>{{$activity->published_at}}</td>

                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.activity.edit',$activity)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.activity.destroy', $activity) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
                    <td colspan="4" class="text-center">No records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $activities->withQueryString()->links() }}
    </div>
@endsection