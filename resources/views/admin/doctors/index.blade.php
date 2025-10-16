@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title', 'Doctors') <!-- Corrected title -->

@section('content')

    <div class="Doctor-Container">
        <button class="button add_doctor" onclick="window.location='{{ route('admin.doctors.create') }}'">Add Doctor</button>
        <!-- Doctor Table -->
        <div class="Doctor-table">
            <div class="table-header">
                <div class="header-id">#</div>
                <div class="header-title">Name</div>
                <div class="header-title">Specialization</div>
                <div class="header-title">Email</div>
                <div class="header-title">Phone</div>
                <div class="header-title">Status</div>
                <div class="header-title">Actions</div>
            </div>

            @foreach($doctors as $doctor)
            <div class="table-row">
                <div class="row-id">{{ $doctor->id }}</div>
                <div class="row-title">{{ $doctor->name }}</div>
                <div class="row-title">{{ $doctor->specialization }}</div>
                <div class="row-title">{{ $doctor->email }}</div>
                <div class="row-title">{{ $doctor->phone }}</div>
                <div class="
                    @if($doctor->status === 'active') text-green 
                    @elseif($doctor->status === 'off-duty') text-yellow
                    @elseif($doctor->status === 'busy') text-red
                    @endif
                    ">
                    {{ ucfirst($doctor->status) }}
                </div>
                <div class="row-actions">
                    <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="button edit_doctor">Edit</a>
                    <button class="button delete_doctor" data-id="{{ $doctor->id }}">Delete</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach click event listeners to all delete buttons
            document.querySelectorAll('.delete_doctor').forEach(button => {
                button.addEventListener('click', function () {
                    const doctorId = this.getAttribute('data-id'); // Get the doctor ID

                    if (confirm('Are you sure you want to delete this doctor?')) {
                        // Send DELETE request via Fetch API
                        fetch(`/admin/doctors/${doctorId}`, {
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
                                alert('Failed to delete doctor.');
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
