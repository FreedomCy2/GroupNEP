<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Clinic Flow Administrator')</title>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">

    <!-- Page-specific CSS (optional) -->
    @stack('styles')
</head>

<body>
    <h1>Admin</h1>
    
    <aside class="sidebar-admin">
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/admin/app.js') }}" defer></script>

    <!-- Page-specific JS (optional) -->
    @stack('scripts')
</body>
</html>
