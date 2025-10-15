@extends('layouts.admin')

@section('title', 'Edit Reminder')

@section('content')
    <div class="Reminder-Edit--Container">
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

        <!-- Reminder Edit Form -->
        <form action="{{ route('admin.reminders.update', $reminder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="patient">Patient Name</div>
                <input type="text" name="patient_name" id="patient_name" class="form-control" value="{{ old('patient_name', $reminder->patient_name) }}" required>
            </div>

            <div class="form-group">
                <div class="symptoms">Symptoms</div>
                <input type="text" name="symptoms" id="symptoms" class="form-control" value="{{ old('symptoms', $reminder->symptoms) }}" required>
            </div>

            <div class="form-group">
                <div class="date">Date</div>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $reminder->date) }}" required>
            </div>

            <div class="form-group">
                <div class="time">Time</div>
                <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $reminder->time) }}" required>
            </div>

            <div class="form-group">
                <div class="status">Status</div>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ old('status', $reminder->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="done" {{ old('status', $reminder->status) == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Reminder</button>
        </form>
    </div>
@endsection