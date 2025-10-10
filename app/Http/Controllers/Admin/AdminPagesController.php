<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index(Request $request)
    {
        // ALL Pages in Admin
        $page = $request->route()->getName(); // e.g. 'admin.bookings'
        $page = str_replace('admin.', '', $page); // e.g. 'bookings'
        $allowedPages = ['bookings', 'dashboard', 'doctors', 'schedule', 'users', 'reminders', 'records'];
        if (!in_array($page, $allowedPages)) {
            abort(404);
        }

        if ($page === 'bookings') {
            $bookings = \App\Models\Booking::all();
            return view('admin.bookings', compact('bookings'));
        }

        return view("admin.$page");
    }

    /*
    * Bookings View
    */

    public function delete($id)
    {
        // Find the booking by ID
        $booking = \App\Models\Booking::find($id);  
        if ($booking) {
            $booking->delete();
        }
        return redirect()->route('admin.bookings')->with('status', 'Booking deactivated successfully.');
    }

    public function destroy($id)
    {
        $booking = \App\Models\Booking::find($id);
        if ($booking) {
            $booking->delete();
        }
        return redirect()->route('admin.bookings')->with('status', 'Booking permanently deleted.');
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'genre' => 'required|string|max:50',
            'rating' => 'required|numeric|min:0|max:50',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking updated successfully.');
    }
}