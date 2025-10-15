<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'patient' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:confirmed,pending,cancelled',
        ]);

        // Create a new booking record
        Booking::create($validatedData);

        // Redirect back to the bookings index page with a success message
        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id); // Find the booking by ID
        return view('admin.booking.edit', compact('booking')); // Pass the booking data to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'patient' => 'required|string|max:255',
            'doctor' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:confirmed,pending,cancelled',
        ]);

        // Find the booking and update it
        $booking = Booking::findOrFail($id);
        $booking->update($validatedData);

        // Redirect back to the bookings index page with a success message
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id); // Find the booking by ID
        $booking->delete(); // Delete the booking

        return response()->json(['success' => true, 'message' => 'Booking deleted successfully!']);
    }
}
