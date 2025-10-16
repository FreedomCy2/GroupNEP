@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title', 'Create Doctor') <!-- Corrected title -->

@section('content')

    <div class="Doctor-Form--Container">
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

        <form action="{{ route('admin.doctors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <div class="name">Name</div>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <div class="specialization">Specialization</div>
            <input type="text" name="specialization" id="specialization" class="form-control" value="{{ old('specialization') }}" required>
        </div>

        <div class="form-group">
            <div class="email">Email</div>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <div class="phone">Phone</div>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>

        <div class="form-group">
            <div class="status">Status</div>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="off-duty" {{ old('status') == 'off-duty' ? 'selected' : '' }}>Off-Duty</option>
                <option value="busy" {{ old('status') == 'busy' ? 'selected' : '' }}>Busy</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Doctor</button>
        </form>
    </div>
@endsection
