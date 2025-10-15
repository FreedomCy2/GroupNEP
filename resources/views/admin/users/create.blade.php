@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title')

Return to User Page (Plz remove)

@endsection

@section('content')

    <div class="User-Form--Container">
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

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <div for="name">Name</div>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <div for="email">Email</div>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <div for="phone_number">Phone Number</div>
                <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
            </div>

            <div class="form-group">
                <div for="joined_date">Joined Date</div>
                <input type="date" name="joined_date" id="joined_date" class="form-control" value="{{ old('joined_date') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
@endsection
