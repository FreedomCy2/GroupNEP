<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic Flow Administrator - </title>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Page-specific CSS (optional) -->
    @stack('styles')
</head>

<body>    
    <div data-layer="DashboardCard" class="Dashboardcard" style="width: 977px; height: 625px; background: rgba(217, 217, 217, 0.80); border-radius: 40px"></div>

    <div data-layer="ProfilePicture" class="Profilepicture" style="width: 66px; height: 66px; position: relative">
        <img data-layer="unnamed_user_pfp.png" class="Unnamed_user_pfp" style="width: 66px; height: 66px; left: 0px; top: 0px; position: absolute" src="public\images\unnamed_user_pfp.png" />
    </div>

    <div data-layer="RewindButton" class="Rewindbutton" style="width: 256px; height: 38px; position: relative">
        <!-- TODO: Replace "PLACEHOLDER" --> 
        <div data-layer="PLACEHOLDER" class="Placeholder" style="width: 210px; height: 38px; left: 46px; top: 0px; position: absolute; color: black; font-size: 27.06px; font-family: Inter; font-weight: 700; line-height: 38px; word-wrap: break-word">PLACEHOLDER</div>
        <div data-layer="goBack-Button" class="goBack-Button" style="width: 23.33px; height: 21.32px; left: 0px; top: 8px; position: absolute; background: black"> </div>
    </div>

    <!-- Sidebar -->
    <div data-layer="Sidebar" class="Sidebar w-48 h-[770px] relative">
        <div data-layer="Rectangle 1" class="Rectangle1 w-48 h-[770px] left-[-7px] top-[5px] absolute">
            <div data-layer="Rectangle 1" class="Rectangle1 w-48 h-[770px] left-0 top-0 absolute bg-cyan-300/50"></div>
        </div>
        <img data-layer="ChatGPT Image Sep 23, 2025, 08_30_51 PM (1) 3" class="ChatgptImageSep232025083051Pm13 w-32 h-32 left-[23.27px] top-[17.35px] absolute" src="https://placehold.co/131x131" />
        <div data-layer="Copyright © 2025 Clinic Flow" class="Copyright2025ClinicFlow w-48 h-5 left-0 top-[751.98px] absolute text-center justify-start text-black text-xs font-normal font-['Inter']">Copyright © 2025 Clinic Flow</div>
        <div data-layer="Bookings" class="Bookings w-24 h-6 left-[46px] top-[255px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Bookings</div>
        <div data-layer="Dashboard" class="Dashboard w-28 h-6 left-[36px] top-[190px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Dashboard</div>
        <div data-layer="Doctors" class="Doctors w-20 h-6 left-[53px] top-[317.51px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Doctors</div>
        <div data-layer="Schedule" class="Schedule w-24 h-6 left-[38px] top-[495px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Schedule</div>
        <div data-layer="Manage Users" class="ManageUsers w-36 h-6 left-[18px] top-[373px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Manage Users</div>
        <div data-layer="Reminders" class="Reminders w-28 h-9 left-[34px] top-[428.03px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Reminders</div>
        <div data-layer="Records" class="Records w-24 h-6 left-[38px] top-[550px] absolute text-center justify-start text-black text-xl font-normal font-['Inter']">Records</div>
    </div>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/admin/app.js') }}" defer></script>

    <!-- Page-specific JS (optional) -->
    @stack('scripts')
</body>
</html>
