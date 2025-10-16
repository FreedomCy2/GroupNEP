@extends('layouts.admin')

@section('title', 'Edit Doctor')

@section('content')
    <div class="Doctor-Edit--Container">
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

        <!-- Doctor Edit Form -->
        <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="name">Name</div>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
            </div>

            <div class="form-group">
                <div class="specialization">Specialization</div>
                <input type="text" name="specialization" id="specialization" class="form-control" value="{{ old('specialization', $doctor->specialization) }}" required>
            </div>

            <div class="form-group">
                <div class="email">Email</div>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
            </div>

            <div class="form-group">
                <div class="phone">Phone</div>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}" required>
            </div>

            <div class="form-group">
                <div class="status">Status</div>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" {{ old('status', $doctor->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="off-duty" {{ old('status', $doctor->status) == 'off-duty' ? 'selected' : '' }}>Off-Duty</option>
                    <option value="busy" {{ old('status', $doctor->status) == 'busy' ? 'selected' : '' }}>Busy</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Doctor</button>
        </form>
    </div>
@endsection