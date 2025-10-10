<!-- resources/view/admin/bookings.blade.php -->

@extends('layouts.admin')

@section('GoBackIcon', asset('icons/goBack-Button.svg'))

@section('title', 'Return to Dashboard')

@section('content')
    <div class="Booking-Container">
        <div class="table-header">
            <span class="table-header__cell">ID</span>
            <span class="table-header__cell">Name</span>
            <span class="table-header__cell">Email</span>
            <span class="table-header__cell">Phone Number</span>
            <span class="table-header__cell">Joined</span>
            <span class="table-header__cell">Action</span>
        </div>

        @foreach($bookings as $booking)
        <div class="table-row">
            <span class="table-row__cell">{{ $booking->id }}</span>
            <span class="table-row__cell">{{ $booking->customer_name }}</span>
            <span class="table-row__cell">{{ $booking->customer_email }}</span>
            <span class="table-row__cell">{{ $booking->customer_phone_number }}</span>
            <span class="table-row__cell">{{ $booking->customer_joined_date }}</span>
            <span class="table-row__delete-cell">
                <a href="javascript:void(0);" class="table-row__delete-cell deleteBtn">Deactivate</a>
            </span>
        </div>
        @endforeach
    </div>
@endsection