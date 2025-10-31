<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/sass/admin.scss')
</head>
<body class="login-body">
    <div>
        <div class="logo">
            <div class="text-center  text-light">
                <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 100px;">
                <h4 class="mt-3 mb-2">Gauhati High Court Kohima Bench</h4>
                <p class="mb-2">Admin Login</p>
            </div>
        </div>
        <div class="login-card">
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
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

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark w-100">LOG IN</button>
                
                <div class="mt-3 text-end">
                    <a href="{{ route('admin.password.request') }}" class="text-decoration-none small">Forgot your password?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>