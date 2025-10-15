@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title', 'Reminders') <!-- Corrected title -->

@section('content')

    <div class="Reminder-Container">
        <button class="button add_reminder" onclick="window.location='{{ route('admin.reminders.create') }}'">Add Reminder</button>
        <!-- Reminder Table -->
        <div class="Reminder-table">
            <div class="table-header">
                <div class="header-id">#</div>
                <div class="header-title">Patient Name</div>
                <div class="header-title">Symptoms</div>
                <div class="header-title">Date</div>
                <div class="header-title">Time</div>
                <div class="header-title">Status</div>
                <div class="header-title">Actions</div>
            </div>

            @foreach($reminders as $reminder)
                <div class="table-row">
                    <div class="row-id">{{ $reminder->id }}</div>
                    <div class="row-title">{{ $reminder->patient_name }}</div>
                    <div class="row-title">{{ $reminder->symptoms }}</div>
                    <div class="row-title">{{ $reminder->date }}</div>
                    <div class="row-title">{{ $reminder->time }}</div>
                    <div class="
                        @if($reminder->status === 'done') text-green 
                        @elseif($reminder->status === 'pending') text-yellow
                        @endif
                        ">
                        {{ ucfirst($reminder->status) }}
                    </div>
                    <div class="row-actions">
                        <a href="{{ route('admin.reminders.edit', $reminder->id) }}" class="button edit_reminder">Edit</a>
                        <button class="button delete_reminder" data-id="{{ $reminder->id }}">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach click event listeners to all delete buttons
            document.querySelectorAll('.delete_reminder').forEach(button => {
                button.addEventListener('click', function () {
                    const reminderId = this.getAttribute('data-id'); // Get the reminder ID

                    if (confirm('Are you sure you want to delete this reminder?')) {
                        // Send DELETE request via Fetch API
                        fetch(`/admin/reminders/${reminderId}`, {
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
                                alert('Failed to delete reminder.');
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
