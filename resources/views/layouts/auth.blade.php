<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @vite('resources/sass/admin.scss')
</head>
<body class="login-body">
    <div class="mt-5">
        <div class="logo">
            <div class="text-center  text-light">
                <img src="{{asset('images/logo.png')}}" alt="Logo" style="height: 100px;">
                <h4 class="mt-3 mb-2">{{config('app.full_name')}}</h4>
                <p class="mb-2">@yield('title')</p>
            </div>
        </div>
        @yield('content')
    </div>
    
    <footer class="position-fixed bottom-0 w-100 text-center py-2">
        <small class="text-white">
            © {{ date('Y') }} {{config('app.full_name')}}. All rights reserved.
        </small>
    </footer>
    @vite(['resources/js/admin.js'])
    @stack('scripts')
</body>
</html>