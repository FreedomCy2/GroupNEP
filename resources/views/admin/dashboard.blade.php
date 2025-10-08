<!-- resources/view/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('title', 'Go Back to Dashboard')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('content')
    <div class="Dashboard-Container">
        <!-- Total Bookings Stats -->
        <div class="Booking_Card">
            <!-- Logo for each "Card" -->
            <img src="{{ asset('icons/calender.svg') }}" alt="Booking Icon" class="card-icon"/>
            
            <!-- TODO: Change from hardcoded values to dynamic values that follow database -->
            <h1 class="stat-value">60</h1>
            <h2 class="stat-title">Total Bookings</h2>
            <img src="{{ asset('images/graph_profit.png') }}" alt="Profit Graph" class="card-icon"/>
            <p class="stat-trend">+5.4% since last month</p>
        </div>
        <div class="Appointment_Card">
            <!-- Logo for each "Card" -->
            <img src="{{ asset('icons/clock.svg') }}" alt="Booking Icon" class="card-icon"/>
            
            <!-- TODO: Change from hardcoded values to dynamic values that follow database -->
            <h1 class="stat-value">3</h1>
            <h2 class="stat-title">Upcoming Appointment</h2>
            <img src="{{ asset('images/graph_profit_hump.png') }}" alt="Stagnant Profit Graph" class="card-icon"/>
            <p class="stat-trend">+20% since last month</p>
        </div>
        <div class="Patient_Card">
            <!-- Logo for each "Card" -->
            <img src="{{ asset('icons/patient.svg') }}" alt="Patient Icon" class="card-icon"/>
            
            <!-- TODO: Change from hardcoded values to dynamic values that follow database -->
            <h1 class="stat-value">15</h1>
            <h2 class="stat-title">Patients</h2>
            <img src="{{ asset('images/graph_deficit.png') }}" alt="Deficit Graph" class="card-icon"/>
            <p class="stat-trend">- 12% since last month</p>
        </div>
        <div class="Doctor_Card">
            <!-- Logo for each "Card" -->
            <img src="{{ asset('icons/doctor.svg') }}" alt="Doctor Icon" class="card-icon"/>
            
            <!-- TODO: Change from hardcoded values to dynamic values that follow database -->
            <h1 class="stat-value">8</h1>
            <h2 class="stat-title">Doctors</h2>
            <img src="{{ asset('images/graph_deficit_hump.png') }}" alt="Recovering Deficit Graph" class="card-icon"/>
            <p class="stat-trend">-8% since last month</p>
        </div>
    </div>
@endsection
