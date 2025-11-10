@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.statistics.index') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Statistics</h4>
        <a class="btn btn-primary" href="{{route('admin.statistics.create')}}">Add Statistics</a>
    </div>

    <!-- Filter Section -->
    <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label small mb-1">Year</label>
                <select name="year" class="form-select form-select-sm">
                    <option value="">All Years</option>
                    @foreach($years as $yearValue => $yearLabel)
                        <option value="{{ $yearValue }}" {{ $selectedYear == $yearValue ? 'selected' : '' }}>
                            {{ $yearLabel }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small mb-1">Month</label>
                <select name="month" class="form-select form-select-sm">
                    <option value="">All Months</option>
                    @foreach($months as $monthValue => $monthLabel)
                        <option value="{{ $monthValue }}" {{ $selectedMonth == $monthValue ? 'selected' : '' }}>
                            {{ $monthLabel }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{route('admin.statistics.index')}}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Year</th>
                    <th>Month</th>
                    <th>Document</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->year }}</td>
                    <td>{{ $statistic->month_name }}</td>
                    <td>
                        @if($statistic->filename)
                            <a href="{{ $statistic->documentUrl() }}" target="_blank">{{ $statistic->documentFilename() }}</a>
                        @else
                            <span class="text-muted">No document</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('admin.statistics.edit',$statistic)}}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this statistics record?')">
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
                    <td colspan="5" class="text-center">No statistics found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $statistics->withQueryString()->links() }}
    </div>
@endsection