@extends('layouts.admin')

@section('PageLogoNav', asset('images/graph-icon.png'))

@section('title', 'Create Reminder') <!-- Corrected title -->

@section('content')

    <div class="Reminder-Form--Container">
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

        <form action="{{ route('admin.reminders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <div class="patient">Patient Name</div>
            <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{ old('patient_name') }}" required>
        </div>

        <div class="form-group">
            <div class="symptoms">Symptoms</div>
            <input type="text" name="symptoms" id="symptoms" class="form-control" value="{{ old('symptoms') }}" required>
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
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Reminder</button>
        </form>
    </div>
@endsection
