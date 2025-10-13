@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title')

You are in Booking Page (Plz remove)

@endsection

@section('content')
    <div class="User-Container">
        <!-- User Table -->
        <div class="User-table">
            <div class="table-header">
                <p class="header-id">#</p>
                <p class="header-title">Name</p>
                <p class="header-title">Email</p>
                <p class="header-title">Phone Number</p>
                <p class="header-title">Joined</p>
                <p class="header-title">Actions</p>
            </div>

            @foreach($clinic_users as $user)
            <div class="table-row">
                <p class="row-id">{{ $user->id }}</p>
                <p class="row-title">{{ $user->name }}</p>
                <p class="row-title">{{ $user->email }}</p>
                <p class="row-title">{{ $user->phone_number }}</p>
                <p class="row-title">{{ $user->joined_date }}</p>
                <p class="row-actions">
                    <button class="button edit_booking">Edit</button>
                    <button class="button delete_booking">Delete</button>
                </p>
            </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
