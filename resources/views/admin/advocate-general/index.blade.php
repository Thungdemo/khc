@extends('layouts.admin')
{{-- @section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.advocate-general.index') }}
@endsection --}}
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Advocate Generals</h4>
        <a class="btn btn-primary" href="{{route('admin.advocate-general.create')}}">Add Advocate General</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Full Name</th>
                    <th>Category</th>
                    <th>Date of Joining</th>
                    <th>Served Till</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($advocateGenerals as $advocateGeneral)
                <tr>
                    <td>{{$advocateGeneral->full_name}}</td>
                    <td>{{$advocateGeneral->agCategory->name}}</td>
                    <td>{{$advocateGeneral->doj}}</td>
                    <td>{{$advocateGeneral->served_till}}</td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu position-fixed">
                                <li><a class="dropdown-item" href="{{route('admin.advocate-general.edit',$advocateGeneral)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.advocate-general.destroy', $advocateGeneral) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this advocate general?')">
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
                    <td colspan="5" class="text-center">No advocate generals found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $advocateGenerals->withQueryString()->links() }}
    </div>
@endsection