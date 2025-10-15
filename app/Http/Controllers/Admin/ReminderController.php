<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminders = Reminder::all(); // Fetch all reminders
        return view('admin.reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reminders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:pending,done',
        ]);

        Reminder::create([
            'patient_name' => $request->input('patient_name'),
            'symptoms' => $request->input('symptoms'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin.reminders.index')->with('success', 'Reminder created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reminder = Reminder::findOrFail($id); // Fetch the reminder by ID
        return view('admin.reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reminder = Reminder::findOrFail($id); // Fetch the reminder by ID
        return view('admin.reminders.edit', compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'symptoms' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:pending,done',
        ]);

        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->all());

        return redirect()->route('admin.reminders.index')->with('success', 'Reminder updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id); // Find the reminder by ID
        $reminder->delete(); // Delete the reminder

        return response()->json([
            'success' => true,
            'message' => 'Reminder deleted successfully!',
        ]);
    }
}
