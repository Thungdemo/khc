@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Former Judges</h4>
        <a class="btn btn-primary btn-sm" href="{{route('admin.former-judge.create')}}">Add</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($formerJudges as $formerJudge)
                    <td>{{$formerJudge->full_name}}</td>
                    <td>{{$formerJudge->start}}</td>
                    <td>{{$formerJudge->end}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.former-judge.edit',$formerJudge)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.former-judge.destroy', $formerJudge) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
        {{ $formerJudges->withQueryString()->links() }}
    </div>
@endsection