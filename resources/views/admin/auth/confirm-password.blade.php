<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/sass/admin.scss')
</head>
<body class="login-body">
    <div>
        <div class="logo">
            <div class="text-center text-light">
                <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 100px;">
                <h4 class="mt-3 mb-2">Gauhati High Court Kohima Bench</h4>
                <p class="mb-2">Confirm Password</p>
            </div>
        </div>
        <div class="login-card">
            <div class="mb-4 text-sm text-muted">
                This is a secure area of the application. Please confirm your password before continuing.
            </div>

            <form method="POST" action="{{ route('admin.password.confirm') }}">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark w-100">Confirm</button>
            </form>
        </div>
    </div>
</body>
</html>