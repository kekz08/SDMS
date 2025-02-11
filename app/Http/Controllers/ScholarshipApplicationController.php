<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\ScholarApplication;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ScholarshipApplicationController extends Controller
{
    public function store(Request $request)
{
    // Validate incoming form data
    $validated = $request->validate([
        'lastname' => 'required|string',
        'firstname' => 'required|string',
        'middlename' => 'nullable|string',
        'sex' => 'required|string',
        'birthdate' => 'required|date',
        'track' => 'required|string',
        'strand' => 'nullable|string',
        'school' => 'required|string',
        'talents' => 'nullable|string',
        'address' => 'required|string',
        'guardian' => 'nullable|string',
        'guardian_name' => 'nullable|string',
        'guardian_contact' => 'nullable|string',
        'father_name' => 'nullable|string',
        'father_occupation' => 'nullable|string',
        'mother_name' => 'nullable|string',
        'mother_occupation' => 'nullable|string',
        'appointment_date' => 'required|date',
        'scholarship' => 'required|exists:scholarships,id', // Ensure scholarship exists
        'report_card' => 'nullable|file|mimes:pdf,jpeg,png,jpg', // Optional file validation
        'clearance' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
        'other_files' => 'nullable|file|mimes:pdf,jpeg,png,jpg',
    ]);

    // Store uploaded files if they exist
    $uploadedFiles = [];

    // Store report card file if exists
    if ($request->hasFile('report_card')) {
        $uploadedFiles['report_card'] = $request->file('report_card')->store('uploads', 'public');
    }

    // Store clearance file if exists
    if ($request->hasFile('clearance')) {
        $uploadedFiles['clearance'] = $request->file('clearance')->store('uploads', 'public');
    }

    // Store other files if exists
    if ($request->hasFile('other_files')) {
        $uploadedFiles['other_files'] = $request->file('other_files')->store('uploads', 'public');
    }

    // Clean file paths by removing 'public/' from the beginning
    foreach ($uploadedFiles as $key => $path) {
        // Remove 'public/' to store the relative path in the database
        $uploadedFiles[$key] = str_replace('public/', '', $path);
    }

    // Create the scholarship application
    $application = ScholarApplication::create([
        'user_id' => Auth::id(), // Assuming the user is logged in
        'scholarship_id' => $validated['scholarship'],
        'lastname' => $validated['lastname'],
        'firstname' => $validated['firstname'],
        'middlename' => $validated['middlename'],
        'sex' => $validated['sex'],
        'birthdate' => $validated['birthdate'],
        'track' => $validated['track'],
        'strand' => $validated['strand'],
        'school' => $validated['school'],
        'talents' => $validated['talents'],
        'address' => $validated['address'],
        'guardian' => $validated['guardian'],
        'guardian_name' => $validated['guardian_name'],
        'guardian_contact' => $validated['guardian_contact'],
        'father_name' => $validated['father_name'],
        'father_occupation' => $validated['father_occupation'],
        'mother_name' => $validated['mother_name'],
        'mother_occupation' => $validated['mother_occupation'],
        'appointment_date' => $validated['appointment_date'],
        'uploaded_files' => json_encode($uploadedFiles), // Save the uploaded file paths as a JSON object
        'status' => 'Pending', // Default status
    ]);

    // Redirect to a success page or display a success message
    return redirect()->route('educational_aid')->with('success', 'Your application has been successfully submitted.');
}


    public function index()
    {
        // Fetch applications for the logged-in user with the related scholarship name
        $applications = ScholarApplication::with('scholarship')
            ->where('user_id', Auth::id())
            ->get();

        // Pass the applications to the Inertia component
        return Inertia::render('ApplicationStatus', [
            'applications' => $applications,
        ]);
    }

    public function approved(){
        $applications = ScholarApplication::all();

        $scholarships = Scholarship::where('scholarship_status', 'Open')->get();

        return Inertia::render('AdminApproved', [
            'applications' => $applications,
            'scholarships' => $scholarships,
        ]);
    }

    public function pending(){
        $applications = ScholarApplication::all();

        return Inertia::render('AdminPending', [
            'applications' => $applications,
        ]);
    }

    public function rejected() {
        $applications = ScholarApplication::with('scholarship')->get()->map(function ($application) {
            return [
                'id' => $application->id,
                'user_id' => $application->user_id,
                'scholarship_id' => $application->scholarship_id,
                'firstname' => $application->firstname,
                'middlename' => $application->middlename,
                'lastname' => $application->lastname,
                'sex' => $application->sex,
                'birthdate' => $application->birthdate,
                'track' => $application->track,
                'strand' => $application->strand,
                'school' => $application->school,
                'talents' => $application->talents,
                'address' => $application->address,
                'guardian' => $application->guardian,
                'guardian_name' => $application->guardian_name,
                'guardian_contact' => $application->guardian_contact,
                'father_name' => $application->father_name,
                'father_occupation' => $application->father_occupation,
                'mother_name' => $application->mother_name,
                'mother_occupation' => $application->mother_occupation,
                'appointment_date' => $application->appointment_date,
                'uploaded_files' => $application->uploaded_files,
                'status' => $application->status,
                'scholarship' => [
                    'scholarship_name' => $application->scholarship->scholarship_name,
                ],
            ];
        });
    
        return Inertia::render('AdminRejected', [
            'applications' => $applications,
        ]);
    }
    


    
    public function updateStatus(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'status' => 'required|in:Approved,Rejected',
        ]);

        // Find the application by its ID
        $application = ScholarApplication::findOrFail($id);

        // Update the status
        $application->status = $request->status;
        $application->save();

        return back()->with('success', 'Application status updated successfully!');
    }

    public function destroy($id)
    {
        try {
            // Find the application by its ID
            $application = ScholarApplication::findOrFail($id);

            // Delete the application
            $application->delete();

            // Return a success response
            return response()->json(['message' => 'Application has been deleted successfully.'], 200);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['message' => 'An error occurred while deleting the application.'], 500);
        }
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'scholarship_id' => 'required|exists:scholarships,id',
            'status' => 'required|string|in:Approved,Pending,Rejected', // Add the status validation
        ]);

        // Find the application by ID
        $application = ScholarApplication::findOrFail($id);

        // Update only the necessary fields
        $application->firstname = $request->input('firstname');
        $application->lastname = $request->input('lastname');
        $application->scholarship_id = $request->input('scholarship_id');
        $application->status = $request->input('status'); // Update the status as well

        // Save the application
        $application->save();

        // Return a response or redirect back to the previous page
        return back()->with('success', 'Application updated successfully!');
    }

    public function view($id)
    {
        // Find the application by its ID
        $application = ScholarApplication::findOrFail($id);

        // Pass the application to the Inertia component
        return Inertia::render('ApplicationView', [
            'application' => $application,
        ]);
    }

}
