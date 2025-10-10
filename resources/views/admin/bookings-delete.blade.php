<!-- booking_users.blade.php -->
@extends('layouts.admin')

<!-- Confirmation Modal -->
<div id="Booking--confirmDelete" class="modal hidden">
    <div class="modal-overlay"></div>
    <div class="modal-box">
        <p>Are you sure you want to delete this booking?</p>
        <button id="cancel">Cancel</button>
        <button id="confirm">Confirm</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.onclick = () => 
            document.getElementById('Booking--confirmDelete').classList.remove('hidden');
    });
    document.getElementById('cancel').onclick = () => 
        document.getElementById('Booking--confirmDelete').classList.add('hidden');
</script>
@endpush