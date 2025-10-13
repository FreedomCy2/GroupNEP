<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClinicUser;
    
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinic_users = ClinicUser::all();
        return view('admin.users.index', compact('clinic_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'joined_date' => 'required|date',
        ]);

        ClinicUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'joined_date' => $request->input('joined_date'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'joined_date' => 'required|date',
        ]);

        // Create a new user record
        ClinicUser::create($validatedData);

        // Redirect back to the users index page with a success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = ClinicUser::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully!',
        ]);
    }
}
