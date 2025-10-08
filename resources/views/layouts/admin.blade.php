<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic Flow Administrator - @yield('title', 'Admin')</title>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">

    @stack('styles')
</head>
<body>
    <div class="layout-flex">
        <!-- Sidebar -->
        <aside class="Sidebar">
            <img class="Sidebar-Logo" src="{{ asset('images/Clinic-Flow-logo.png') }}" />
            
            <div class="SidebarMenu">
                <div class="SidebarMenuItem">Bookings</div>
                <div class="SidebarMenuItem">Dashboard</div>
                <div class="SidebarMenuItem">Doctors</div>
                <div class="SidebarMenuItem">Schedule</div>
                <div class="SidebarMenuItem">Manage Users</div>
                <div class="SidebarMenuItem">Reminders</div>
                <div class="SidebarMenuItem">Records</div>
            </div>
            
            <footer class="CopyrightNotice_Sidebar">Copyright © 2025 Clinic Flow</footer>
        </aside>

        <!-- Main Content Area -->
        <main class="MainContent">
            <header class="MainHeader">
                <!-- Page Title is called via layout @extend('admin') -->
                <div class="MainHeaderTitleGroup">
                    <img class="PageLogoNav" src="@yield('PageLogoNav')" alt="Page Logo Nav">
                    <h1 class="MainTitle">@yield('title', 'Admin')</h1>
                </div>
                
                <!-- User Avatar -->
                <!-- TODO: Make this dynamic later -->
                <nav class="UserAvatar">
                    <img class="Undefined_UserAvatar" src="{{ asset('images/unnamed_user_pfp.png') }}" alt="Unnamed User Avatar" />
                </nav>
            </header>

            <section class="DashboardCard">
                @yield('content')
            </section>
        </main>
    </div>

    <script src="{{ asset('js/admin/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
