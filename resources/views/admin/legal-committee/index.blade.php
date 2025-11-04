@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Legal Committee</h4>
        <a class="btn btn-primary" href="{{route('admin.legal-committee.create')}}">Add</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Photo</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($legalCommittees as $legalCommittee)
                <tr>
                    <td>{{$legalCommittee->full_name}}</td>
                    <td>{{$legalCommittee->designation}}</td>
                    <td>
                        @if($legalCommittee->photo)
                            <img src="{{ asset('storage/' . $legalCommittee->photo) }}" alt="Photo" class="img-thumbnail" style="max-height: 50px;">
                        @else
                            <span class="text-muted">No photo</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.legal-committee.edit',$legalCommittee)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.legal-committee.destroy', $legalCommittee) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
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
        {{ $legalCommittees->withQueryString()->links() }}
    </div>
@endsection