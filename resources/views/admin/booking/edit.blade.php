@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')
    <div class="Booking-Edit--Container">
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Booking Edit Form -->
        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="patient">Patient Name</div>
                <input type="text" name="patient" id="patient" class="form-control" value="{{ old('patient', $booking->patient) }}" required>
            </div>

            <div class="form-group">
                <div class="doctor">Doctor Name</div>
                <input type="text" name="doctor" id="doctor" class="form-control" value="{{ old('doctor', $booking->doctor) }}" required>
            </div>

            <div class="form-group">
                <div class="date">Date</div>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $booking->date) }}" required>
            </div>

            <div class="form-group">
                <div class="time">Time</div>
                <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $booking->time) }}" required>
            </div>

            <div class="form-group">
                <div class="status">Status</div>
                <select name="status" id="status" class="form-control:focus" required>
                    <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Booking</button>
        </form>
    </div>
@endsection