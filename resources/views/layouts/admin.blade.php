<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic Flow Administrator - @yield('title', 'Admin')</title>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">

    @stack('styles')
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <aside data-layer="Sidebar" class="Sidebar">
            <div data-layer="Rectangle 1" class="Rectangle1"></div>
            <img class="Sidebar-Logo" src="{{ asset('images/Clinic-Flow-logo.png') }}" />
            <div data-layer="SidebarMenu" class="SidebarMenu">
                <div data-layer="Bookings" class="Bookings">Bookings</div>
                <div data-layer="Dashboard" class="Dashboard">Dashboard</div>
                <div data-layer="Doctors" class="Doctors">Doctors</div>
                <div data-layer="Schedule" class="Schedule">Schedule</div>
                <div data-layer="Manage Users" class="ManageUsers">Manage Users</div>
                <div data-layer="Reminders" class="Reminders">Reminders</div>
                <div data-layer="Records" class="Records">Records</div>
            </div>
            <div data-layer="Copyright © 2025 Clinic Flow" class="Copyright2025ClinicFlow w-48 h-5 text-center justify-start text-black text-xs font-normal font-['Inter']">Copyright © 2025 Clinic Flow</div>
        </aside>
        <!-- Main Content Area -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/admin/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
