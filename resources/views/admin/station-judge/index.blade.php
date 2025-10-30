@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Station Judge</h4>
        <a class="btn btn-primary" href="{{route('admin.station-judge.create')}}">Add</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Parent Court</th>
                    <th>Stream</th>
                    <th>Stationing</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stationJudges as $stationJudge)
                    <td>{{$stationJudge->full_name}}</td>
                    <td>{{$stationJudge->parent_court}}</td>
                    <td>{{$stationJudge->stream}}</td>
                    <td>{{$stationJudge->stationing}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu position-fixed">
                                <li><a class="dropdown-item" href="{{route('admin.station-judge.edit',$stationJudge)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.station-judge.destroy', $stationJudge) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
        {{ $stationJudges->withQueryString()->links() }}
    </div>
@endsection