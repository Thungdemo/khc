@extends('layouts.auth')
@section('title', 'Admin Login')

    @section('content')
        <div class="login-card">
            <form method="POST" action="{{ route('admin.login') }}" class="safe-submit">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if(config('khc.captcha'))
                <div class="mb-3">
                    <div class="d-flex gap-2 align-items-center mb-2">
                        <div class="flex-grow-1">
                            @captcha
                        </div>
                    </div>
                    <input type="text" name="captcha" id="captcha" class="form-control @error('captcha') is-invalid @enderror" value="{{ old('captcha') }}" placeholder="Enter the code above">
                    @error('captcha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @endif
                {{-- <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div> --}}

                <button type="submit" class="btn btn-dark w-100">LOG IN</button>
                
                {{-- <div class="mt-3 text-end">
                    <a href="{{ route('admin.password.request') }}" class="text-decoration-none small">Forgot your password?</a>
                </div> --}}
            </form>
        </div>
    @endsection
    @push('scripts')
    