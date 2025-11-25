@extends('layouts.admin')
@section('breadcrumbs')
    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('admin.calendar.index') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Calendar Events</h4>
        <a class="btn btn-primary" href="{{ route('admin.calendar.create') }}">Add Event</a>
    </div>

    <!-- Filter Section -->
    <div class="mb-3 p-3 bg-white rounded shadow-sm">
        <form class="row g-3 align-items-end" method="GET" action="{{ route('admin.calendar.index') }}">
            <div class="col-md-3">
                <label class="form-label small mb-1">Title</label>
                <input type="text" class="form-control form-control-sm" placeholder="Title" name="title" value="{{ request('title') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label small mb-1">Type</label>
                <select name="type" class="form-select form-select-sm">
                    <option value="">All Types</option>
                    <option value="national" {{ request('type') == 'national' ? 'selected' : '' }}>National</option>
                    <option value="restricted" {{ request('type') == 'restricted' ? 'selected' : '' }}>Restricted</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small mb-1">Start Date</label>
                <input type="text" class="form-control form-control-sm datepicker" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label small mb-1">End Date</label>
                <input type="text" class="form-control form-control-sm datepicker" name="end_date" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
                <a href="{{ route('admin.calendar.index') }}" class="btn btn-sm btn-secondary">Clear</a>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Type</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($calendars as $calendar)
                    <tr>
                        <td>{{ $calendar->title }}</td>
                        <td>{{ $calendar->start_date }}</td>
                        <td>{{ $calendar->end_date }}</td>
                        <td>
                            {{ ucfirst($calendar->type) }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="row-options dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Options</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.calendar.edit', $calendar) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('admin.calendar.destroy', $calendar) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this calendar event?')">
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
                        <td colspan="6" class="text-center">No calendar events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $calendars->withQueryString()->links() }}
    </div>
@endsection