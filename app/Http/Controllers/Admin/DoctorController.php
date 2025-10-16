<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all(); // Fetch all doctors
        return view('admin.doctors.index', compact('doctors')); // Pass doctors to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create'); // Return the create doctor form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:doctors,email',
            'phone' => 'required|string|max:20',
            'status' => 'required|in:active,off-duty,busy',
        ]);

        // Create a new doctor record
        Doctor::create($validatedData);

        // Redirect back to the doctors index page with a success message
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctors = Doctor::findOrFail($id); // Find the doctor by ID
        return view('admin.doctors.show', compact('doctor')); // Pass the doctor data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctors = Doctor::findOrFail($id); // Find the doctor by ID
        return view('admin.doctors.edit', compact('doctor')); // Pass the doctor data to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:doctors,email,' . $id,
            'phone' => 'required|string|max:20',
            'status' => 'required|in:active,off-duty,busy',
        ]);

        // Find the doctor and update it
        $doctors = Doctor::findOrFail($id);
        $doctor->update($validatedData);

        // Redirect back to the doctors index page with a success message
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctors = Doctor::findOrFail($id); // Find the doctor by ID
        $doctors->delete(); // Delete the doctor

        return response()->json(['success' => true, 'message' => 'Doctor deleted successfully!']);
    }
}
