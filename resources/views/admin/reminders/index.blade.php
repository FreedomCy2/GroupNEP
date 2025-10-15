@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title')

You are in Booking Page (Plz remove)

@endsection

@section('content')

    <div class="Booking-Container">
        <button class="button add_booking" onclick="window.location='{{ route('admin.bookings.create') }}'">Add Booking</button>
        <!-- Booking Table -->
        <div class="Booking-table">
            <div class="table-header">
                <div class="header-id">#</div>
                <div class="header-title">Patient</div>
                <div class="header-title">Doctor</div>
                <div class="header-title">Date</div>
                <div class="header-title">Time</div>
                <div class="header-title">Status</div>
                <div class="header-title">Actions</div>
            </div>

            @foreach($bookings as $booking)
            <div class="table-row">
                <div class="row-id">{{ $booking->id }}</div>
                <div class="row-title">{{ $booking->patient }}</div>
                <div class="row-title">{{ $booking->doctor }}</div>
                <div class="row-title">{{ $booking->date }}</div>
                <div class="row-title">{{ $booking->time }}</div>
                <div class="
                    @if($booking->status === 'confirmed') text-green 
                    @elseif($booking->status === 'pending') text-yellow
                    @elseif($booking->status === 'cancelled') text-red
                    @endif
                    ">
                    {{ $booking->status }}
                </div>
                <div class="row-actions">
                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="button edit_booking">Edit</a>
                    <button class="button delete_booking" data-id="{{ $booking->id }}">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach click event listeners to all delete buttons
            document.querySelectorAll('.delete_booking').forEach(button => {
                button.addEventListener('click', function () {
                    const bookingId = this.getAttribute('data-id'); // Get the booking ID

                    if (confirm('Are you sure you want to delete this booking?')) {
                        // Send DELETE request via Fetch API
                        fetch(`/admin/bookings/${bookingId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                                'Content-Type': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message); // Show success message
                                this.closest('.table-row').remove(); // Remove the row from the table
                            } else {
                                alert('Failed to delete booking.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                    }
                });
            });
        });
    </script>
@endsection
