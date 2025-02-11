<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(){

        $scholarships = Scholarship::all();

        return Inertia::render('AdminEducationalAid', [
            'scholarships' => $scholarships,
        ]);
    }

    public function userEducationalAid()
    {
        // Fetch scholarships and convert them to an array
        $scholarships = Scholarship::all();

        return Inertia::render('EducationalAid', [
            'scholarships' => $scholarships,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'scholarship_name' => 'required|string|max:255',
            'scholarship_description' => 'required|string',
            'scholarship_type' => 'required|string|max:100',
            'scholarship_amount' => 'required|numeric|min:0',
            'scholarship_status' => 'required|string|in:Open,Closed',
            'application_deadline' => 'required|date|after:today',
        ]);

        // Store the scholarship in the database
        $scholarship = Scholarship::create($validated);

        // Return a successful response with the created scholarship
        return response()->json([
            'message' => 'Scholarship created successfully!',
            'data' => $scholarship
        ], 201); // 201 status code for created resource
    }

    // Method to update the educational aid
    public function update(Request $request, $id)
    {
        // Find the scholarship by ID
        $scholarship = Scholarship::find($id);

        if (!$scholarship) {
            return response()->json(['message' => 'Scholarship not found'], 404);
        }

        // Validate incoming data (optional)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'due' => 'required|date',
        ]);

        // Update the scholarship
        $scholarship->update($validatedData);

        // Return the updated scholarship data
        return response()->json($scholarship);
    }

    public function destroy($id){
        $scholarship = Scholarship::find($id);
        if (!$scholarship) {
            return response()->json(['message' => 'Scholarship not found'], 404);
        
            }
            $scholarship->delete();
            return response()->json(['message' => 'Scholarship deleted successfully'], 200);
            
    }

    public function applyScholarship(){
        // Fetch scholarships and convert them to an array
        $scholarships = Scholarship::all();

        return Inertia::render('Apply', [
            'scholarships' => $scholarships,
        ]);
    }
}
