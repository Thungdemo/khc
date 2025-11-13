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
            <div class="card p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted">Total Users</div>
                        <div class="card-counter">{{$totalUsers}}</div>
                    </div>
                    <i class="bi bi-people fs-2 text-muted"></i>
                </div>
            </div>
        </div>
        @endcan
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted">Total Notices</div>
                        <div class="card-counter">{{$totalNotices}}</div>
                    </div>
                    <i class="bi bi-currency-dollar fs-2 text-muted"></i>
                </div>
            </div>
        </div>
        {{-- <div class="col-12 col-sm-6 col-md-4">
            <div class="card p-3 shadow-sm">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-muted">Active Sessions</div>
                        <div class="card-counter">87</div>
                    </div>
                    <i class="bi bi-graph-up fs-2 text-muted"></i>
                </div>
            </div>
        </div> --}}
    </div>
    <footer class="mt-5 text-center small text-muted">© {{date('Y')}} {{config('app.full_name')}}</footer>
</div>
@endsection