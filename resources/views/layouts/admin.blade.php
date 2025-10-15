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
            
            <!-- PS: Plz only add routing here AFTER kau buat route arah web.php & frontend -->
            <div class="SidebarMenu">
                <a href="{{ route('admin.bookings.index') }}" class="SidebarMenuItem">Bookings</a>
                <a href="{{ route('admin.dashboard') }}" class="SidebarMenuItem">Dashboard</a>
                <div class="SidebarMenuItem">Doctors</div>
                <div class="SidebarMenuItem">Schedule</div>
                <a href="{{ route('admin.users.index') }}" class="SidebarMenuItem">Manage Users</a>
                <div class="SidebarMenuItem">Reminders</div>
                <div class="SidebarMenuItem">Records</div>
            </div>
            
            <footer class="CopyrightNotice_Sidebar">Copyright © 2025 Clinic Flow</footer>
        </aside>

        <!-- Main Content Area -->
        <main class="MainContent">
            <header class="MainHeader">
                @if(Route::currentRouteName() === 'admin.dashboard')
                    <div class="MainHeader-TitleGroup">
                        <img class="PageLogoNav" src="@yield('PageLogoNav')" alt="Page Logo Nav">
                        <h1 class="MainTitle">@yield('title', 'Admin')</h1>
                    </div>
                @else
                    <div class="MainHeader-TitleGroup">
                        <a href="{{ route('admin.dashboard') }}" class="goBack-link">
                            <img src="@yield('GoBackIcon', asset('icons/goBack-Button.svg'))" alt="Go Back" class="goBack-icon">
                        </a>
                        <h1 class="MainTitle">@yield('title', 'Admin')</h1>
                    </div>
                @endif
                
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

    @section('GoBackNav')
    <a href="{{ route('admin.dashboard') }}" class="goBack-link">
        <img src="{{ asset('icons/goBack-Button.svg') }}" alt="Go Back" class="goBack-icon">
    </a>
    @endsection

    <script src="{{ asset('js/admin/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
