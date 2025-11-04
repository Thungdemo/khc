@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">Advocate Generals</h2>
        {{-- <p class="text-muted mb-0">List of Advocate Generals who have served the Gauhati High Court Kohima Bench</p> --}}
    </div>

    @forelse($categories as $category)
        @if($category->advocateGenerals->count() > 0)
        <div class="card-wrap p-4 mb-4">
            <div class="d-flex align-items-center mb-3">
                <h4 class="fw-bold mb-0">{{ $category->name }}</h4>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="fw-semibold">#</th>
                            <th scope="col" class="fw-semibold">Name</th>
                            <th scope="col" class="fw-semibold">Date of Joining</th>
                            <th scope="col" class="fw-semibold">Served Till</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->advocateGenerals as $advocateGeneral)
                        <tr>
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $advocateGeneral->full_name }}</div>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $advocateGeneral->doj }}
                                </span>
                            </td>
                            <td>
                                <span class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $advocateGeneral->served_till }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    @empty
    <div class="card-wrap p-5 text-center">
        <div class="mb-3">
            <i class="bi bi-person-badge display-1 text-muted"></i>
        </div>
        <h4 class="text-muted mb-2">No Advocate Generals Found</h4>
        <p class="text-muted">Advocate General information will be displayed here once available.</p>
    </div>
    @endforelse
</div>
@endsection