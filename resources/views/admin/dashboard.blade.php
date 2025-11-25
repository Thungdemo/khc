@extends('layouts.admin')
@section('content')

<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Overview</h4>
        {{-- <small class="text-muted">Updated: Oct 26, 2025</small> --}}
    </div>
    <div class="row g-3 mb-4">
        @can('user')
        <div class="col-12 col-sm-6 col-md-4">
            <a class="card dashboard-card" href="{{route('admin.user.index')}}">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-muted">Users</div>
                        <div class="card-counter">{{$totalUsers}}</div>
                    </div>
                    <i class="bi bi-people fs-2 text-muted"></i>
                </div>
            </a>
        </div>
        @endcan
        @can('cms')
        <div class="col-12 col-sm-6 col-md-4">
            <a class="card dashboard-card" href="{{route('admin.notice.index')}}">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-muted">Notices</div>
                        <div class="card-counter">{{$totalNotices}}</div>
                    </div>
                    <i class="bi bi-pin-angle fs-2 text-muted"></i>
                </div>
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <a class="card dashboard-card" href="{{route('admin.calendar.index')}}">
                <div class="d-flex justify-content-between">
                    <div>
                        <div class="text-muted">Calendar</div>
                        <div class="card-counter"></div>
                    </div>
                    <i class="bi bi-calendar-date fs-2 text-muted"></i>
                </div>
            </a>
        </div>
        @endcan
    </div>
</div>
@endsection