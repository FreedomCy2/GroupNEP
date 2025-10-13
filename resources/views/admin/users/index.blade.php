@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title')

You are in User Page (Plz remove)

@endsection

@section('content')
    <div class="User-Container">
        <button class="button add_User" onclick="window.location='{{ route('admin.users.create') }}'">Add User</button>
        <!-- User Table -->
        <div class="User-table">
            <div class="table-header">
                <div class="header-id">#</div>
                <div class="header-title">Name</div>
                <div class="header-title">Email</div>
                <div class="header-title">Phone Number</div>
                <div class="header-title">Joined</div>
                <div class="header-title">Actions</div>
            </div>

            @foreach($clinic_users as $user)
            <div class="table-row">
                <div class="row-id">{{ $user->id }}</div>
                <div class="row-title">{{ $user->name }}</div>
                <div class="row-title">{{ $user->email }}</div>
                <div class="row-title">{{ $user->phone_number }}</div>
                <div class="row-title">{{ $user->joined_date }}</div>
                <div class="row-actions">
                    <button class="button delete_User" data-id="{{ $user->id }}">Deactivate</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach click event listeners to all delete buttons
            document.querySelectorAll('.delete_User').forEach(button => {
                button.addEventListener('click', function () {
                    const userId = this.getAttribute('data-id'); // Get the User ID

                    if (confirm('Are you sure you want to delete this user?')) {
                        // Send DELETE request via Fetch API
                        fetch(`/admin/users/${userId}`, {
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
                                alert('Failed to delete user.');
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
