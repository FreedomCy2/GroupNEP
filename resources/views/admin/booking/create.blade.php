@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title')

Return to Booking Page (Plz remove)

@endsection

@section('content')

    <div class="Booking-Form--Container">
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

        <form action="{{ route('admin.bookings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <div class="patient">Patient Name</div>
            <input type="text" name="patient" id="patient" class="form-control" value="{{ old('patient') }}" required>
        </div>

        <div class="form-group">
            <div class="doctor">Doctor Name</div>
            <input type="text" name="doctor" id="doctor" class="form-control" value="{{ old('doctor') }}" required>
        </div>

        <div class="form-group">
            <div class="date">Date</div>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
        </div>

        <div class="form-group">
            <div class="time">Time</div>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time') }}" required>
        </div>

        <div class="form-group">
            <div class="status">Status</div>
            <select name="status" id="status" class="form-control" required>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
    </div>
@endsection
