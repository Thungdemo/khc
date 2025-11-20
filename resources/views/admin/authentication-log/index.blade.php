@extends('layouts.admin')



@section('content')
    <h4 class="mb-4">Authentication Logs</h4>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Login At</th>
                            <th>Login Successful</th>
                            <th>Logout At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>
                                @if($log->authenticatable)
                                    {{ $log->authenticatable->name ?? $log->authenticatable->email ?? $log->authenticatable->id }}
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $log->ip_address }}</td>
                            <td><span class="small">{{ Str::limit($log->user_agent, 40) }}</span></td>
                            <td>{{ $log->login_at }}</td>
                            <td>
                                @if($log->login_successful)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </td>
                            <td>{{ $log->logout_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No authentication logs found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
