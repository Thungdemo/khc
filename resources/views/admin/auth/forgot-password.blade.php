<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/sass/admin.scss')
</head>
<body class="login-body">
    <div>
        <div class="logo">
            <div class="text-center text-light">
                <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 100px;">
                <h4 class="mt-3 mb-2">Gauhati High Court Kohima Bench</h4>
                <p class="mb-2">Reset Password</p>
            </div>
        </div>
        <div class="login-card">
            <div class="mb-4 text-sm text-muted">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark w-100">Email Password Reset Link</button>
                
                <div class="mt-3 text-center">
                    <a href="{{ route('admin.login') }}" class="text-decoration-none small">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>