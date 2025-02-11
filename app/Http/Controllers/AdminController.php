<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request; // Correct import
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Method to get the admins and pass it to the Inertia view
    public function index()
    {
        // Fetch all users (or admins if you have a role check)
        $users = User::all();

        // Return the Inertia view with the users data
        return Inertia::render('ManageAdmins', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|in:user,admin', // Only allow user or admin
        ]);

        // Define the default password
        $defaultPassword = 'password123';

        // Create the new admin with the default hashed password
        $admin = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($defaultPassword),  // Hash the default password
        ]);

        // Return a success response
        return response()->json(['message' => 'Admin added successfully!', 'admin' => $admin]);
    }


    public function update(Request $request, User $admin)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|in:user,admin', // Validate role to be either user or admin
        ]);

        // Update the admin
        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'], // Assuming role is stored as string
        ]);

        return response()->json(['message' => 'Admin updated successfully!']);
    }

    public function destroy($id)
    {
        $admin = User::find($id);

        if (!$admin) {
            return response()->json(['message' => 'Admin not found.'], 404);
        }

        $admin->delete();

        return response()->json(['message' => 'Admin deleted successfully.']);
    }

}
