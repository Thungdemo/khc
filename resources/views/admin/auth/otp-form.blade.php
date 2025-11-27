@extends('layouts.auth')
@section('title', 'Admin Login')

    @section('content')
        <div class="login-card">
            <form method="POST" action="{{ route('admin.verify-otp') }}" class="safe-submit">
                @csrf

                <div class="alert alert-info mb-3">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    An OTP has been sent to your registered email address.
                </div>
                <div class="mb-3">
                    <label for="otp" class="form-label">Enter OTP</label>
                    <input type="text" class="form-control @error('otp') is-invalid @enderror" id="otp" name="otp" value="{{ old('otp') }}" autocomplete="off" maxlength="{{config('otp.length')}}">
                    @error('otp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark w-100">Verify</button>
                <div class="mt-3 text-end">
                    <a href="{{ route('admin.login') }}" class="text-decoration-none small">Back to Login</a>
                </div>
            </form>
        </div>
    @endsection
    @push('scripts')
    